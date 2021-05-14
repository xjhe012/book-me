<?php

namespace App\Services\User;

use App\Models\User\UserModel;
use Illuminate\Support\Facades\Auth;
use Log;
class UserService {

    public function getAllUser()
    {
        $users =  UserModel::all();
        return $users;
    }

    public function create($data){
        try{
            $data['password'] = bcrypt($data['password']);
            UserModel::create($data);
            return true;
        }catch(\Exception $e) {
            Log::error("cURL Error #:" . $e);
            return false;
        }
    }

    public function update($data){
        try{
            $user = UserModel::find($data['id']);
            $user->password = bcrypt($data['password']);
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->save();
            return true;
        }catch(\Exception $e) {
            Log::error("cURL Error #:" . $e);
            return false;
        }
    }

    public function delete($data)
    {
        try{
            $user = UserModel::find($data['id']);
            $user->deleted = 1;
            $user->save();
            return true;
        }catch(\Exception $e) {
            Log::error("cURL Error #:" . $e);
            return false;
        } 
    }
}