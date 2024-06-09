<?php

namespace App\Models\Admin\Service;

use App\Models\Admin\Admin;
use App\Models\Admin\Repository\AdminRepository;
use Illuminate\Support\Facades\Hash;

class AdminService
{
    public function __construct(private readonly AdminRepository $repository)
    {}

    public function passwordCheck($password, Admin $admin)
    {
        return Hash::check($password, $admin->getPassword());
    }
}
