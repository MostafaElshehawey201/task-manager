<?php

namespace App\Interfaces\Auth\Strategies;

interface ManagerRequestOtpStrategyInterface
{
    public function ManagerRequestOtp($requestOtpDTO);
}
