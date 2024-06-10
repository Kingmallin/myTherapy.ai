<?php

namespace App\Http\Controllers;

use App\Models\Admin\Repository\AdminRepository;
use App\Models\Ai\AiConversation;
use App\Models\Ai\Repository\AiConversationRepository;
use App\Models\Ai\Service\AiChatBotService;
use App\Models\Therapist\Repository\TherapistRepository;
use App\Models\User\Repository\UserRepository;
use App\Models\Websocket\Repository\WebSocketRepository;
use App\Models\Websocket\Service\websocketService;
use App\Models\Websocket\WebSocketConnection;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Illuminate\Support\Facades\Log;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class SocketController implements MessageComponentInterface
{
    protected $clients;
    protected $clientMap;
    protected $entityManager;
    protected $websocketRepository;
    protected $websocketService;
    protected $therapistRepository;
    protected $userRepository;
    protected $adminRepository;
    protected $aiConversationRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->clients = new \SplObjectStorage;
        $this->clientMap = [];
        $this->entityManager = $entityManager;
        $this->websocketRepository = new WebSocketRepository($entityManager);
        $this->websocketService = new websocketService($this->websocketRepository);
        $this->therapistRepository = new TherapistRepository($entityManager);
        $this->userRepository = new UserRepository($entityManager);
        $this->adminRepository = new AdminRepository($entityManager);
        $this->aiConversationRepository = new AiConversationRepository($entityManager);
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $queryParams = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryParams, $queryArray);
        
        $channel = $queryArray['channel'] ?? null;
        if ($channel) {

            $user = null;
            $admin = null;
            $webSocketConnection = null;
            $explodedChannel = explode('.', $channel);

            if ($explodedChannel[0] === 'admin' && isset($explodedChannel[1])) {
                $admin = $this->adminRepository->findByUuid($explodedChannel[1]);
                if ($entity = $this->websocketRepository->findByArray([
                    'admin' => $admin,
                    'channel' => $channel
                ])) {
                    Log::info('found existing and updated');
                    // entity should only ever be one
                    $count = 0;
                    foreach ($entity as $socket) {
                        if ($count > 1) {
                            continue;
                        } else {
                            $count++;
                            $this->websocketService->update($socket, $conn->resourceId);  
                            $webSocketConnection = $socket;
                        }
                    }
                } else {
                    $webSocketConnection = new WebSocketConnection(
                        $user,
                        $admin,
                        $conn->resourceId,
                        $channel,
                        'UTC'
                    );
                    // Save $webSocketConnection to the database
                    $this->entityManager->persist($webSocketConnection);
                    $this->entityManager->flush();
                }
                $user = null;
                $id = $admin->getId();
            } else if ($explodedChannel[0] === 'user' && isset($explodedChannel[1])) {
                $user = $this->userRepository->findByUuid($explodedChannel[1]);
                $admin = null;
                $id = $user->getId();
            } else {
                throw new Exception('Only valid users can send messages');
            }

            $this->clients->attach($conn, $webSocketConnection);
            $this->clientMap[$channel][$conn->resourceId] = $conn;

            echo "New connection! ({$conn->resourceId}) with clientId: {$id} on channel: {$channel}\n";
        } else {
            echo "New connection! ({$conn->resourceId}) without clientId or channel\n";
        }
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = json_decode($msg, true);

        $target = $data['data']['target'] ?? null;
        $channel = $data['channel'] ?? null;

        $connected = $this->websocketRepository->findByArray([
            'channel' => $channel
        ]);

        echo "Message should be sent to channel: {$channel}\n";

        if ($target) {
            try {
                $explodedChannel = explode('.', $channel);
                if (count($explodedChannel) < 3) {
                    throw new Exception('Invalid channel format');
                }

                $therapist = $this->therapistRepository->findById($explodedChannel[2]);

                if ($explodedChannel[0] === 'admin' && isset($explodedChannel[1])) {
                    $admin = $this->adminRepository->findByUuid($explodedChannel[1]);
                    $user = null;
                } else {
                    $user = $this->userRepository->findByUuid($explodedChannel[1]);
                    $admin = null;
                }

                $aiConversation = new AiConversation(
                    $therapist,
                    $user,
                    $admin,
                    $data['data']['message'],
                    $data['data']['sender']
                );

                $aiResponse = $this->getAIResponse(
                    $therapist,
                    $user,
                    $admin,
                    $data['data']['message'],
                    $data['data']['sender']
                );

                $aiConversation = new AiConversation(
                    $therapist,
                    $user,
                    $admin,
                    $aiResponse,
                    'Therapist'
                );

                // Save the conversation to the database
                $this->aiConversationRepository->save($aiConversation);

                $response = [
                    'from' => 'AI',
                    'message' => $aiResponse
                ];

                foreach ($connected as $receiver) {
                    echo "Sending message to {$channel} socket Id {$receiver->getClientId()} ";
                    foreach ($this->clients as $client) {
                        if ($receiver->getClientId() == $client->resourceId) {
                            $client->send(json_encode($response)); 
                        }
                    }
                }
            } catch (Exception $e) {
                Log::error('error: ' . $e->getMessage());
            }
        } else {
            Log::info('Invalid target or target not provided in the message data');
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $webSocketConnection = $this->clients[$conn] ?? null;
        if ($webSocketConnection) {
            $webSocketConnection->deactivate();

            // Update the connection in the database
            $this->entityManager->flush();

            $channel = $webSocketConnection->getChannel();
            unset($this->clientMap[$channel][$conn->resourceId]);
        }

        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    private function getAIResponse($therapist, $user, $admin, $message, $sender)
    {
        $aiConversation = new AiConversation(
            $therapist,
            $user,
            $admin,
            $message,
            $sender
        );

        // Save the conversation to the database
        $this->aiConversationRepository->save($aiConversation);

        // Use AiChatBotService to make the API call
        $aiChatBotService = new AiChatBotService($therapist, $this->aiConversationRepository);
        $response = $aiChatBotService->makeApiCall($user ? $user : null, $admin ? $admin : null);

        return $response['choices'][0]['message']['content'];
    }
}
