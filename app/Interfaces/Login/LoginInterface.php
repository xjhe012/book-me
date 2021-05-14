<?php

namespace App\Interfaces\Login;

interface LoginInterface{
    public function authenticate($credentials);
}