<?php

namespace App\Rules;

use App\Models\User\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Validation\Rule;

class UniqueUserUsername implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $value]);

        return !$existingUser;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute already exists.';
    }
}
