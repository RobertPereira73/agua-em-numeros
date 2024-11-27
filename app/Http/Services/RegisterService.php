<?php

namespace App\Http\Services;

use App\Models\User;

class RegisterService
{
    public function register(array $values) : User
    {
        return User::create([
            'name' => $values['nome'],
            'middle_name' => $values['sobrenome'],
            'email' => $values['email'],
            'password' => $values['password']
        ]);
    }
}