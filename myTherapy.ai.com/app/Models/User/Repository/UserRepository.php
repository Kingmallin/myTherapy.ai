<?php

namespace App\Models\User\Repository;

use AllowDynamicProperties;
use App\Models\User\User;
use Doctrine\ORM\EntityManagerInterface;

#[AllowDynamicProperties] class UserRepository
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    /**
     * @param null|string $uUid
     * @return User|null
     */
    public function findByUuid(?string $uUid): User|null
    {
        return $this->repository->findOneBy(['uUid' => $uUid]);
    }

    /**
     * @param User $user
     * @return user|null
     */
    public function save(User $user): User|null
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
        return $user;
    }
}
