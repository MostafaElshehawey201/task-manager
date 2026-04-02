<?php

namespace App\Interfaces\Auth\Strategies\Process;

interface ProcessRequestOtpStratiesInterface
{
    public function typeLogin($requestOtpDTO);

    public function login($requestOtpDTO);

    public function otp($user);
}
