<?php

namespace App\Strategies\Auth\Process;

use App\Interfaces\Auth\Strategies\Process\ProcessRequestOtpStratiesInterface;
use App\Models\Otp;
use App\Models\User;

class RequestOtpPhoneStrategy implements ProcessRequestOtpStratiesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function typeLogin($requestOtpDTO)
    {
        return preg_match('/^[0-9]{10,14}$/', $requestOtpDTO->login);
    }

    public function login($requestOtpDTO)
    {
        return User::where('phone', $requestOtpDTO->login)->first();
    }

    public function otp($user)
    {
        $otp = random_int(100000, 999999);
        Otp::create([
            "user_id" => $user->id,
            "otp" => $otp,
            "used" => 0,
            "expires_at" => now()->addMinutes(2),
        ]);
        return $otp;
    }
}
