<?php

namespace App\Models\Admin\Service;

use App\Models\Admin\Admin;
use App\Models\Admin\Repository\AdminRepository;
use Illuminate\Support\Facades\Hash;

class CreateAdminService
{
    public function __construct(private readonly AdminRepository $repository)
    {
    }

    public function emailExsists($email): bool
    {
        return (bool) $this->repository->getAdminByEmail($email);
    }

    public function usernameExsists($username): bool
    {
        return (bool) $this->repository->getAdminByUsername($username);
    }

    public function create($firstName, $lastName, $userName, $password, $email)
    {
        return $this->repository->save(new Admin($firstName, $lastName, $userName, Hash::make($password), $email));
    }
}
