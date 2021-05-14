<?php

namespace App\Services\Authentication;
use Illuminate\Support\Facades\Auth;

class AuthService{


    public function authenticate($credentials){

        return Auth::attempt($credentials);
    
    }
}