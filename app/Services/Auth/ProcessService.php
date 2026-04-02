<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\CredinatiolNotValiedExcption;
use App\Interfaces\Auth\LoginServiceInterface;
use App\Interfaces\Auth\RegisterRepositoryInterface;
use App\Interfaces\Auth\RegisterServiceInterface;
use App\Interfaces\Auth\RequestOtpServiceInterface;
use App\Interfaces\Auth\Strategies\ManagerLoginStrategyInterface;
use App\Interfaces\Auth\Strategies\ManagerRequestOtpStrategyInterface;

class ProcessService implements RegisterServiceInterface , LoginServiceInterface , RequestOtpServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RegisterRepositoryInterface $register_repository_interface ,
    protected ManagerLoginStrategyInterface $manager_login_strategy_interface,
    protected ManagerRequestOtpStrategyInterface $manager_request_otp_strategy_interface)
    {

    }

    public function register($RegisterDTO){
        return $this->register_repository_interface->createUser($RegisterDTO);
    }

    public function login($LoginDTO){
        return $this->manager_login_strategy_interface->ManagerLoginStrategy($LoginDTO);
    }

    public function RequestOtp($requestOtpDTO){
        $otp = $this->manager_request_otp_strategy_interface->ManagerRequestOtp($requestOtpDTO);
        if($otp == null){
            throw new CredinatiolNotValiedExcption(422);
        }
        return $otp;
    }
}
