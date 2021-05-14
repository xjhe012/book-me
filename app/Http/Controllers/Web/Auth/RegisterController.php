<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Authentication\RegisterService;
use App\Http\Requests\Register\RegRequest;
use App\User;
class RegisterController extends Controller
{            
    /**
     * Method index
     *
     * @params void
     * @return view 
     */
    public function index(){
        // 
        return view('register');
    }

    public function store(RegRequest $request){

        $data = $request->all();
        $regService = new RegisterService();
        $result = $regService->createUser($data);
        if($result){
            return redirect('/login')->with('alert-sucess', 'Succesfully Registered you may now log in.');
        }else{
            return back()->with('alert-error', 'Something went wrong Please try again!');
        }
    }
}
