<?php

namespace App\Http\Response\User;

use App\Http\Response\UserResponseInterface;
use App\Models\User\Services\EncryptionService;
use App\Models\User\User;
use Illuminate\Support\Facades\App;

class NewUserResponse implements UserResponseInterface
{
    /**
     * @param User $user
     * @return array
     */
    public static function one(User $user): array
    {
        $encryptionService = App::make(EncryptionService::class);

        $tokenPayload = [
            'uuid' => $user->getUuid(),
            'level' => $user->getSubscriptionLevel(),
        ];

        $token = $encryptionService->encrypt(json_encode($tokenPayload));

        return [
            'id' => $user->getId(),
            'firstName' => $user->getName(),
            'sureName' => $user->getSurName(),
            'username' => $user->getUsername(),
            'penName' => $user->getPenName(),
            'subLevel' => $user->getSubscriptionLevel(),
            'timeZone' => $user->getTimeZone(),
            'hash' => $user->getUuid(),
            'token' => $token
        ];
    }
}
