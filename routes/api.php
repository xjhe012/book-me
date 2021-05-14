<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RoutessServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->get('users',  ['uses' => 'Api\UserController@index']);
$router->post('user/create',  ['uses' => 'Api\UserController@createUser']);
