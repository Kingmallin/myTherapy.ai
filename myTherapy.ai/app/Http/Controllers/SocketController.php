<?php

namespace App\Http\Controllers;

use App\Models\Admin\Repository\AdminRepository;
use App\Models\User\Repository\UserRepository;
use App\Models\Websocket\Repository\WebSocketRepository;
use App\Models\Websocket\WebSocketConnection;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Illuminate\Support\Facades\Log;
use Doctrine\ORM\EntityManagerInterface;

class SocketController implements MessageComponentInterface
{
    protected $clients;
    protected $clientMap;
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->clients = new \SplObjectStorage;
        $this->clientMap = [];
        $this->entityManager = $entityManager;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $queryParams = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryParams, $queryArray);
        $clientId = explode('.', $queryArray['clientId']) ?? null;
        $channel = $queryArray['channel'] ?? null;
        $type = $queryArray['type'] ?? null;

        if ($clientId && $channel) {
            $userRepository = new UserRepository($this->entityManager);
            $adminRepository = new AdminRepository($this->entityManager);

            $user = null;
            $admin = null;

            if ($type === 'admin') {
                $admin = $adminRepository->findByUuid($clientId[0]);
            } elseif ($type === 'user') {
                $user = $userRepository->findByUuid($clientId[0]);
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

            echo "New connection! ({$conn->resourceId}) with clientId: {$clientId[0]} on channel: {$channel}\n";
        } else {
            echo "New connection! ({$conn->resourceId}) without clientId or channel\n";
        }
    }

    public function onMessage(ConnectionInterface $conn, $msg)
    {
        $data = json_decode($msg, true);
        Log::info('message received', ['data' => $data, 'conn' => $conn]);

        $target = $data['data']['target'] ?? null;
        $channel = $data['channel'] ?? null;

        $websocketRepositroy = new WebSocketRepository($this->entityManager);
        $connected = $websocketRepositroy->findByArray([
            'channel' => $channel
        ]);

        if ($target && isset($this->clientMap[$channel])) {
            $aiResponse = $this->getAIResponse($data['data']['message']);
            $response = [
                'from' => 'AI',
                'message' => $aiResponse
            ];

            foreach ($connected as $reciver) {
                $this->clientMap[$channel][$reciver->getClientId()]->send(json_encode($response));
            }
        } else {
            // Handle invalid or unspecified target
            Log::info('Invalid target or target not provided in the message data');
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $webSocketConnection = $this->clients[$conn];
        $webSocketConnection->deactivate();

        // Update the connection in the database
        $this->entityManager->flush();

        $channel = $webSocketConnection->getChannel();
        unset($this->clientMap[$channel][$conn->resourceId]);

        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        Log::info('error: ' . $e->getMessage());
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    private function getAIResponse($message)
    {
        // Example AI integration (replace with actual AI service call)
        $response = "Echo: " . $message; // Simple echo response for demonstration

        // Assuming you're using some AI service, e.g., OpenAI API, implement the call here.
        // $response = $this->callAIService($message);

        return $response;
    }
}
