<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Authentication\AuthService;
class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $auth =  new  AuthService();

        if($auth->authenticate($credentials)) {
            return redirect()->intended('/');
        }else{
            return  back()->withErrors(['Email or Password is incorrect']);
        }
    }
}