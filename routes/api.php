<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#admin login- 13/03/2021
Route::get('/admin/login',['as'=>'admin/login','uses'=>'Api\UsersController@adminlogin']);
#admin login- 13/03/2021
Route::any('/login',['as'=>'login','uses'=>'Api\UsersController@admindologin']);
#Logout- 13/03/2021
Route::get('/logout',['as'=>'logout','uses'=>'Api\UsersController@getlogout']);
#Dashboard- 13/03/2021
Route::any('index',['as'=>'index','uses'=>'Api\UsersController@getdashboard']);
#To display the users list- 13/01/2021
Route::any('/user/index',['as'=>'user_list','uses'=>'Api\UsersController@getuserindex']);
# To add users- 13/03/2021
Route::get('/addUser',array('as'=>'addUser','uses'=>'Api\UsersController@addUser'));
# To add users- 13/03/2021
Route::post('/user/add',array('as'=>'addUser','uses'=>'Api\UsersController@getStore'));
# To edit users- 13/03/2021
Route::any('/user/{id}/edit',array('as'=>'editUser','uses'=>'Api\UsersController@getEdit'));
# To update users data- 13/03/2021
Route::any('/user/update',array('as'=>'updateUser','uses'=>'Api\UsersController@getUpdate'));
#To delete user-13/03/2021
Route::any('/user/{id}','Api\UsersController@userdelete');
