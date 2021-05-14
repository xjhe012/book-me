<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
     protected $fillable = ['name', 'email', 'password','deleted'];
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users'; 
    

}
