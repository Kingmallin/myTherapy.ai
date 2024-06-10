<?php

namespace App\Models\Websocket\Service;

use App\Models\Websocket\Repository\WebSocketRepository;
use App\Models\Websocket\WebSocketConnection;
use DateTimeImmutable;
use Illuminate\Support\Facades\Log;

class websocketService {

    public function __construct(public readonly WebSocketRepository $webSocketRepository)
    {
    }

    public function update($entity, $clientId)
    {
        Log::info('updating');
        $entity->setClientId($clientId);
        $entity->setUpdatedDateTime((new DateTimeImmutable()));
        $this->webSocketRepository->save($entity);
    }
}