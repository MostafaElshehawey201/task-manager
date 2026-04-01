<?php

namespace App\Strategies\Auth\Process;

use App\Exceptions\Auth\EmailNotFoundException;
use App\Exceptions\Auth\PasswordErrorException;
use App\Interfaces\Auth\Strategies\Process\ProcessStrategiesInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmailStrategy implements ProcessStrategiesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function typeLogin($LoginDTO)
    {
        return filter_var($LoginDTO->login, FILTER_VALIDATE_EMAIL);
    }


    public function login($LoginDTO)
    {
        $user = User::where('email', $LoginDTO->login)->first();
        if (!$user) {
            throw new EmailNotFoundException(404);
        }
        if (Hash::check($LoginDTO->password, $user->paasword)) {
            throw new PasswordErrorException(422);
        }
        return $user->createToken('auth-token')->plainTextToken;
    }
}
