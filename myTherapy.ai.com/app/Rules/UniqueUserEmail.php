<?php

namespace App\Rules;

use App\Models\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueUserEmail implements Rule
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $value]);

        return !$existingUser;
    }

    /**
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute already exists.';
    }
}
