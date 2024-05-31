<?php

namespace App\Models\Ai\Repository;

use App\Models\Ai\AiConversation;
use Doctrine\ORM\EntityManagerInterface;

class AiConversationRepository
{
    private $repository;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->repository->getRepository(AiConversation::class);
    }

    public function save($aiConversation)
    {
        $this->entityManager->persist($aiConversation);
        $this->entityManager->flush($aiConversation);
        return $aiConversation;
    }
}