<?php

namespace App\Strategies\Auth\Process;

use App\Interfaces\Auth\Strategies\Process\ProcessRequestOtpStratiesInterface;
use App\Models\Otp;
use App\Models\User;

class RequestOtpEmailStrategy implements ProcessRequestOtpStratiesInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function typeLogin($requestOtpDTO){
        return filter_var($requestOtpDTO->login , FILTER_VALIDATE_EMAIL);
    }

    public function login($requestOtpDTO){
        return User::where('email' , $requestOtpDTO->login)->first();
    }

    public function otp($user){
        $otp = random_int(100000,999999);
        Otp::create([
            "user_id" => $user->id,
            "otp" => $otp,
            "used" => 0 ,
            "expires_at" => now()->addMinutes(2),
        ]);
        return $otp;
    }
}
