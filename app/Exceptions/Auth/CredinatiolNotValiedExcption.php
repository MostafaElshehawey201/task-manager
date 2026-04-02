<?php

namespace App\Exceptions\Auth;

use Exception;

class CredinatiolNotValiedExcption extends Exception
{
     public function __construct($code)
    {
        return parent::__construct(__('messages.credinatial.NotValied'),$code);
    }
}
