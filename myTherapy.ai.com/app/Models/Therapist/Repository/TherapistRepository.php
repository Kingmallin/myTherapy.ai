<?php

namespace App\Models\Therapist\Repository;

use App\Models\Therapist\Therapist;
use Doctrine\ORM\EntityManagerInterface;
class TherapistRepository {

    private $repository;

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(Therapist::class);
    }

    public function index()
    {
        return $this->repository->findAll();
    }

    public function findById($id)
    {
        return $this->repository->find($id);
    }
    
    public function save(Therapist $therapist)
    {
        $this->entityManager->persist($therapist);
        $this->entityManager->flush($therapist);
        return $therapist;
    }

    public function remove(Therapist $therapist)
    {
        $this->entityManager->remove($therapist);
        $this->entityManager->flush();
        return;
    }
}
