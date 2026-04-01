<?php

namespace App\Interfaces\Auth\Strategies\Process;

interface ProcessStrategiesInterface
{
    public function typeLogin($LoginDTO);


    public function login($LoginDTO);
}
