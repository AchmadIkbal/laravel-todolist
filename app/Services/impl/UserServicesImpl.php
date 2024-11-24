<?php

namespace App\Services\impl;

use App\Services\UserService;

class UserServicesImpl implements UserService
{
    private array $users = [
        "Achmad" => "ikbal"
    ];

    public function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password === $correctPassword;
    }
}
