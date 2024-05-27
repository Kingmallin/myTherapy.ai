<?php

namespace App\Models\User\Services;

use App\Enums\SubscriptionLevel;
use App\Enums\UserStatus;
use App\Models\User\Repository\UserRepository;
use App\Models\User\User;

class UserService {
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function create(
        string $name,
        string $surName,
        string $username,
        string $penName,
        string $dob,
        string $email,
        string $password,
        bool $verified,
        string $ip,
        string $timeZone,
        UserStatus $userStatus,
        SubscriptionLevel $subscriptionLevel
    ): User {
        $user = new User(
            $name,
            $surName,
            $username,
            $penName,
            $dob,
            $email,
            $password,
            $verified,
            $ip,
            $timeZone,
            $userStatus,
            $subscriptionLevel
        );
        return $this->repository->save($user);
    }
}
