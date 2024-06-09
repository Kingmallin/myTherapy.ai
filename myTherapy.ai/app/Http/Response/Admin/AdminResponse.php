<?php

namespace App\Http\Response\Admin;

use App\Models\Admin\Admin;

class AdminResponse
{
    /**
     * Transform a single admin.
     *
     * @param Admin $admin
     * @return array
     */
    public static function one(Admin $admin): array
    {
        return [
            'id' => $admin->getId(),
            'uuid' => $admin->getUuid(),
            'firstName' => $admin->getFirstName(),
            'LastName' => $admin->getLastName(),
            'userName' => $admin->getUsername()
        ];
    }

    /**
     * Transform multiple admins.
     *
     * @param array $admins
     * @return array
     */
    public static function many(array $admins): array
    {
        $response = [];
        foreach ($admins as $admin) {
            $response[] = self::one($admin);
        }
        return $response;
    }
}
