<?php

namespace App\Services\User;

use App\Models\User;

class CommandService
{
    public function create(string $name, string $phone): User
    {
        return User::create(['name' => htmlspecialchars($name), 'phone' => htmlspecialchars($phone)]);
    }
}
