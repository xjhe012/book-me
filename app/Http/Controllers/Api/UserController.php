<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use DB,Log;
class UserController extends Controller
{

    public function index(){
        $data = DB::table('users')->get();
        return response()->json($data);
    }

    public function createUser(request $request){
        $model = new user();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()],422);      
        }else{
            try{
                $model->name = $request->get('name');
                $model->email = $request->get('email');
                $model->password = $request->get('password');
                $model->save();
                return response()->json('User Created!',200);
            }catch (\Exception $e) {
                Log::error($e);
                return response()->json('Error, Please try again!',500);
            }
        }

    }
    public function editUser(request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$request->get('id'),
            // 'password'=>'required'
        ];
        
        $user = User::findorfail($request->get('id'));
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();

        
    }
       
}
