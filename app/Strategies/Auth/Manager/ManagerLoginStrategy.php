<?php

namespace App\Strategies\Auth\Manager;

use App\Interfaces\Auth\Strategies\ManagerLoginStrategyInterface;
use App\Strategies\Auth\Process\EmailStrategy;
use App\Strategies\Auth\Process\PhoneStrategy;

class ManagerLoginStrategy implements ManagerLoginStrategyInterface
{
    /**
     * Create a new class instance.
     */
    protected $strategies;

    public function __construct(protected EmailStrategy $email_strategy, protected PhoneStrategy $phone_strategy)
    {
        $this->strategies = [
            $email_strategy ,
            $phone_strategy ,
        ];
    }

    public function ManagerLoginStrategy($LoginDTO){
        foreach($this->strategies as $strategy){
            if($strategy->typeLogin($LoginDTO)){
                return $strategy->login($LoginDTO);
            }
        }
    }
}
