<?php

namespace App\Http\Response;

use App\Models\User\User;

interface UserResponseInterface
{
    /**
     * Transform a single item.
     *
     * @param User $user
     * @return array
     */
    public static function one(User $user): array;
}
