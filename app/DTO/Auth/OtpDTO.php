<?php

namespace App\DTO\Auth;

class OtpDTO{
    public $login;

    public function __construct($validation)
    {
        $this->login = $validation['login'];
    }
}
