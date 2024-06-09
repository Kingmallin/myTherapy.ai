<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\SocketController;
use Doctrine\ORM\EntityManagerInterface;

class WebSocketServer extends Command
{
    protected $signature = 'websocket:init';
    protected $description = 'Start the WebSocket server';
    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    public function handle()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new SocketController($this->entityManager)
                )
            ),
            8090
        );

        $server->run();
    }
}
