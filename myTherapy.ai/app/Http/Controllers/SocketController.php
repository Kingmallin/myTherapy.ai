<?php

namespace App\Http\Controllers;

use App\Models\Admin\Repository\AdminRepository;
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

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->clients = new \SplObjectStorage;
        $this->clientMap = [];
        $this->entityManager = $entityManager;
        $this->websocketRepository = new WebSocketRepository($entityManager);
        $this->websocketService = new websocketService($this->websocketRepository);
    }

    public function onOpen(ConnectionInterface $conn)
    {
        Log::info('onOpen called');
        $queryParams = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryParams, $queryArray);
        
        $channel = $queryArray['channel'] ?? null;
        if ($channel) {
            $userRepository = new UserRepository($this->entityManager);
            $adminRepository = new AdminRepository($this->entityManager);

            $user = null;
            $admin = null;
            $explodedChannel = explode('.', $channel) ?? null;

            if ($explodedChannel[0] === 'admin') {
                $admin = $adminRepository->findByUuid($explodedChannel[1]);
                if ($entity = $this->websocketRepository->findByArray([
                    'admin' => $admin,
                    'channel' => $channel
                    ])) {
                        Log::info('found exsiting and updated');
                        //entity should only ever be one
                        foreach ( $entity as $connection) {
                          $this->websocketService->update($entity, $conn->resourceId);  
                        }
                    
                } else {
                    Log::info('not found creating new socket record');
                    $webSocketConnection = new WebSocketConnection(
                        $user,
                        $admin,
                        $conn->resourceId,
                        $channel,
                        'UTC'
                    );
                }
                $user = null;
                $id = $admin->getId();
            } else if ($explodedChannel[0] === 'user') {
                $user = $userRepository->findByUuid($explodedChannel[1]);
                $admin = null;
                $id = $user->getId();
            } else {
                throw new Exception('Only valid users can send messages');
            }


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

            $this->clients->attach($conn, $webSocketConnection);
            $this->clientMap[$channel][$conn->resourceId] = $conn;

            echo "New connection! ({$conn->resourceId}) with clientId: {$id} on channel: {$channel}\n";
        } else {
            echo "New connection! ({$conn->resourceId}) without clientId or channel\n";
        }
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        Log::info('onMessage called');
        $data = json_decode($msg, true);
        Log::info('Message received', ['data' => $data, 'conn' => $conn]);

        $target = $data['data']['target'] ?? null;
        $channel = $data['channel'] ?? null;

        $connected = $this->websocketRepository->findByArray([
            'channel' => $channel
        ]);

        echo "Message should be sent to channel: {$channel}\n";
        if ($target) {
            $aiResponse = $this->getAIResponse($data['data']['message']);
            $response = [
                'from' => 'AI',
                'message' => $aiResponse
            ];

            foreach ($connected as $receiver) {
                Log::info("Sending message to channel: {$channel}, socket Id: {$receiver->getClientId()}");
                echo "Sending message to {$channel} socket Id {$receiver->getClientId()} ";
                foreach ($this->clients as $client) {
                    if ($receiver->getClientId() == $client->resourceId) {
                        $client->send(json_encode($response)); 
                    }
                }
            }
        } else {
            Log::info('Invalid target or target not provided in the message data');
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        Log::info('onClose called');
        $webSocketConnection = $this->clients[$conn];
        $webSocketConnection->deactivate();

        // Update the connection in the database
        $this->entityManager->flush();

        $channel = $webSocketConnection->getChannel();
        unset($this->clientMap[$channel][$conn->resourceId]);

        $this->clients->detach($conn);
        Log::info("Connection {$conn->resourceId} has disconnected");
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    private function getAIResponse($message)
    {
        // Example AI integration (replace with actual AI service call)
        Log::info('getAIResponse called');
        $response = "Echo: " . $message; // Simple echo response for demonstration

        // Assuming you're using some AI service, e.g., OpenAI API, implement the call here.
        // $response = $this->callAIService($message);

        return $response;
    }
}
