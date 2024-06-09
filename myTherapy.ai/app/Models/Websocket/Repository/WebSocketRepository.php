<?php

namespace App\Models\Websocket\Repository;

use App\Models\Websocket\WebSocketConnection;
use Doctrine\ORM\EntityManagerInterface;

class WebSocketRepository
{
    public $repository;

    public function __construct(public EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(WebSocketConnection::class);
    }

    /**
     * Get a WebSocket connection by its ID.
     *
     * @param int $id
     * @return WebSocketConnection|null
     */
    public function getById(int $id): ?WebSocketConnection
    {
        return $this->repository->find($id);
    }

    /**
     * Save a WebSocket connection.
     *
     * @param WebSocketConnection $webSocketConnection
     */
    public function save(WebSocketConnection $webSocketConnection): void
    {
        $this->entityManager->persist($webSocketConnection);
        $this->entityManager->flush();
    }

    /**
     * Delete a WebSocket connection.
     *
     * @param WebSocketConnection $webSocketConnection
     */
    public function delete(WebSocketConnection $webSocketConnection): void
    {
        $this->entityManager->remove($webSocketConnection);
        $this->entityManager->flush();
    }

     /**
     * Find WebSocket connections by criteria.
     *
     * @param array $criteria
     * @return WebSocketConnection[]
     */
    public function findByArray(array $criteria)
    {
        return $this->repository->findBy($criteria);
    }
}
