<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\Auth\RegisterInterface;

class AuthController extends Controller
{
    public function __construct(protected RegisterInterface $register_interface)
    {

    }
    public function register(RegisterRequest $registerRequest){
        $validation = $registerRequest->validated();
        $RegisterDTO = new RegisterDTO($validation);
        $this->register_interface->register($RegisterDTO);
    }
}
