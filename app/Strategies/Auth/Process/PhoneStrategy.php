<?php

namespace App\Strategies\Auth\Process;

use App\Exceptions\Auth\PasswordErrorException;
use App\Exceptions\Auth\PhoneNotFoundException;
use App\Interfaces\Auth\Strategies\Process\ProcessStrategiesInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PhoneStrategy implements ProcessStrategiesInterface
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
        return preg_match('/^[0-9]{10,14}$/', $LoginDTO->login);
    }


    public function login($LoginDTO)
    {
        $user = User::where('phone', $LoginDTO->login)->first();
        if (!$user) {
            throw new PhoneNotFoundException(424);
        }
        if (Hash::check($LoginDTO->password, $user->paasword)) {
            throw new PasswordErrorException(422);
        }
        return $user->createToken('auth-token')->plainTextToken;
    }
}
