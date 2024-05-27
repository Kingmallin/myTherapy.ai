<?php

namespace App\Models\Admin\Repository;

use AllowDynamicProperties;
use App\Models\Admin\Admin;
use Doctrine\ORM\EntityManagerInterface;

#[AllowDynamicProperties] class AdminRepository
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(Admin::class);
    }

    public function getAdminByEmail($email)
    {
        return $this->repository->findOneBy(['email' => $email]);
    }

    public function getAdminByUsername($userName)
    {
        return $this->repository->findOneBy(['username' => $userName]);
    }

    public function getAdminUsernameOrEmail($emailOrUsername)
    {
        if (!$admin = $this->getAdminByUsername($emailOrUsername)) {
            $admin = $this->getAdminByEmail($emailOrUsername);
        }
        return $admin;
    }

    public function findByUuid($uuid)
    {
        return $this->repository->findOneBy(['uuid' => $uuid]);
    }

    public function save($admin)
    {
        $this->entityManager->persist($admin);
        $this->entityManager->flush($admin);
        return $admin;
    }
}
