<?php

namespace App\Models\Ai\Repository;

use App\Models\Admin\Admin;
use App\Models\Ai\AiConversation;
use App\Models\User\User;
use Doctrine\ORM\EntityManagerInterface;

class AiConversationRepository
{
    private $repository;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(AiConversation::class);
    }

    public function findByUserAdmin(?User $user, ?Admin $admin)
    {
        return $this->repository->findBy([
            'user' => $user ? $user->getId() : null,
            'admin' => $admin ? $admin->getId() : null
        ]);
    }

    public function save($aiConversation)
    {
        $this->entityManager->persist($aiConversation);
        $this->entityManager->flush($aiConversation);
        return $aiConversation;
    }
}