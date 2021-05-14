<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('auth','Web\Auth\AuthController@login');
Route::get('register','Web\Auth\RegisterController@index');
Route::post('register/store','Web\Auth\RegisterController@store');
//User Route
Route::get('users', 'Web\Admin\User\UserController@index');
Route::get('user/create', 'Web\Admin\User\UserController@create');
Route::post('user/store', 'Web\Admin\User\UserController@store');
Route::get('user/show', 'Web\Admin\User\UserController@show');
Route::post('user/update', 'Web\Admin\User\UserController@update');
Route::post('user/delete', 'Web\Admin\User\UserController@delete');
// end of user route

// Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('welcome');
    });

// });