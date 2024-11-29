<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;

class RegisterService
{
    public function register(array $values) : User
    {
        $user = User::firstOrNew(
            [
                'id' => $values['id'] ?? null
            ],
            [
                'name' => $values['nome'],
                'middle_name' => $values['sobrenome'],
            ]
        );

        $user->fill([
            'password' => $values['password'] ?? $user->password,
            'email' => $values['email'] ?? $user->email
        ]);

        $user->save();
        if ($values['avatar']) {
            $user->avatar = $this->avatarPath($user->id, $values['avatar']);
            $user->save();
        }

        return $user;
    }

    public function avatarPath($userId, UploadedFile $avatar)
    {
        return 'images/' . $avatar->store("avatar/{$userId}", 'publicImages');
    }
}