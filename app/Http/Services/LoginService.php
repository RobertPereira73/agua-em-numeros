<?php

namespace App\Http\Services;

use App\Helpers\ValidateException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function authenticateCred(string $email, string $password) : void
    {
        $user = User::userByEmail($email);
        if (!$this->validatePassword($password, $user->password)) {
            ValidateException::throwException('password', ['Senha incorreta!']);
        }

        $this->login($user);
    }

    public function validatePassword(?string $requestPassword, string $userPassword) : bool
    {
        return Hash::check($requestPassword, $userPassword);
    }

    public function login (User $user) : void
    {
        auth()->login($user);
    }
}