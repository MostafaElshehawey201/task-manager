<?php

namespace App\Services\Auth;

use App\Interfaces\Auth\LoginServiceInterface;
use App\Interfaces\Auth\RegisterRepositoryInterface;
use App\Interfaces\Auth\RegisterServiceInterface;

class ProcessService implements RegisterServiceInterface , LoginServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected RegisterRepositoryInterface $register_repository_interface)
    {

    }

    public function register($RegisterDTO){
        return $this->register_repository_interface->createUser($RegisterDTO);
    }

    public function login($LoginDTO){
        
    }
}
