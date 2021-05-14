<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Models\User\UserModel;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
class UserController extends Controller
{    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct(){
        $this->userService = new UserService();
    }
        
    /**
     * Method index
     *
     * @return void
     */
    public function index(){
        $users =    $this->userService->getAllUser();
        // pr($users); exit;   
        return view('Pages/User.index',['users'=>$users]);
    }
    
    /**
     * Method create
     *
     * @return void
     */
    public function create(){
        return view('Pages/User.create');
    }
    
    /**
     * Method store
     *
     * @param UserCreateRequest $request [explicite description]
     *
     * @return void
     */
    public function store(UserCreateRequest $request){
        $data = $request->all();
        $result =  $this->userService->create($data);
        if($result){
            return redirect('/users')->with('alert-sucess', 'User Successfully Saved.');
        }else{
            return back()->with('alert-error', 'Something went wrong Please try again!');
        }
    }
    
    /**
     * Method show
     *
     * @param request $request [explicite description]
     *
     * @return void
     */
    public function show(request $request){
        $user = UserModel::find($request->get('id'));
        return view('Pages/User.edit',['user'=>$user]);
    }
    
    /**
     * Method update
     *
     * @param UserUpdateRequest $request [validation rules for updating users]
     *
     * @return void
     */
    public function update(UserUpdateRequest $request){
        
        $data = $request->all();
        $result =  $this->userService->update($data);
        if($result){
            return redirect('/users')->with('alert-sucess', 'User Successfully Saved.');
        }else{
            return back()->with('alert-error', 'Something went wrong Please try again!');
        }
    }
    
    /**
     * Method delete 
     *
     * @return void
     */
    public function delete(request $request){
        $data = $request->all();
        $result =  $this->userService->delete($data);
        if($result){
            return redirect('/users')->with('alert-sucess', 'User Successfully deleted.');
        }else{
            return back()->with('alert-error', 'Something went wrong Please try again!');
        }
    }
}
