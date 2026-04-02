<?php

namespace App\DTO\Auth;

class RequestOtpDTO{
    public $login;

    public function __construct($validation)
    {
        $this->login = $validation['login'];
    }
}
