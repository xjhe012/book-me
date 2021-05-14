<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Register\RegisterInterface;
use App\User;
use app\Vendor;
use Log;
class RegisterService{


    /**
     * Method createUser
     *
     * @param $data array
     *
     * @return void
     */
    public function createUser($data)
    {
        try{
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return true;
        }catch(\Exception $e) {
            Log::error("cURL Error #:" . $e);
            return false;
        }
    }
}



