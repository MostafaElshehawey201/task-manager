<?php

namespace App\Strategies\Auth\Manager;

use App\Exceptions\Auth\CredinatiolNotValiedExcption;
use App\Interfaces\Auth\Strategies\ManagerRequestOtpStrategyInterface;
use App\Strategies\Auth\Process\RequestOtpEmailStrategy;
use App\Strategies\Auth\Process\RequestOtpPhoneStrategy;

class ManagerRequestOtpStrategy implements ManagerRequestOtpStrategyInterface
{
    /**
     * Create a new class instance.
     */
    public $strategies;

    public function __construct(protected RequestOtpEmailStrategy $request_otp_email_strategy , protected RequestOtpPhoneStrategy $request_otp_phone_strategy)
    {
        $this->strategies = [
            $request_otp_email_strategy,
            $request_otp_phone_strategy
        ];
    }

    public function ManagerRequestOtp($requestOtpDTO){
        foreach($this->strategies as $strategy){
            if($strategy->typeLogin($requestOtpDTO)){
                $user = $strategy->login($requestOtpDTO);
                if($user == null){
                    return $user;
                }
                return $strategy->otp($user);
            }
        }
        throw new CredinatiolNotValiedExcption(422);
    }
}
