<?php

namespace App\Models\Blog\Repositorys;

use App\Models\Blog\BlogPost;
use Doctrine\ORM\EntityManagerInterface;

class BlogRepository {

    public $repository;

    public function __construct(public EntityManagerInterface $entityManager)
    {
        $this->repository = $this->entityManager->getRepository(BlogPost::class);
    }

    public function find()
    {
        return $this->repository->findAll();
    }

    public function findById($id): BlogPost
    {
        return $this->repository->find($id);
    }

    public function save(BlogPost $blog)
    {
        $this->entityManager->persist($blog);
        $this->entityManager->flush($blog);
    }

    public function delete($id)
    {
        $this->entityManager->remove($this->findById($id));
        $this->entityManager->flush();
    }
}