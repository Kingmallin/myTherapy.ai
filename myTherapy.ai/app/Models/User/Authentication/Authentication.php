<?php

namespace App\Models\User\Authentication;

use App\Models\Admin\Admin;
use App\Models\User\User;

class Authentication
{
    private ?User $user = null;
    private ?Admin $admin = null;

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setAdmin(Admin $admin): void
    {
        $this->admin = $admin;
    }

    public function getAdmin(): ?Admin
    {
        return $this->admin;
    }

    public function isAuthenticated(): bool
    {
        return $this->user !== null;
    }
}
