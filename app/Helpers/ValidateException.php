<?php

namespace App\Helpers;

use Illuminate\Validation\ValidationException;

class ValidateException
{
    public static function throwException(string $key, array $errors) : void
    {
        throw ValidationException::withMessages([
            $key => $errors
        ]);
    }
}