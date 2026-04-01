<?php

namespace App\Interfaces\Auth;

interface RegisterRepositoryInterface
{
    public function createUser($RegisterDTO);
}
