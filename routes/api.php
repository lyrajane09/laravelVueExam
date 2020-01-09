<?php

use Illuminate\Http\Request;

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

Route::prefix('auth')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::get('dashboard', 'AdminController@index');
        Route::get('roles', 'AdminController@roles')->middleware('isAdmin');
        Route::get('users', 'AdminController@users')->middleware('isAdmin');
        Route::post('add-role', 'AdminController@addRole')->middleware('isAdmin');
        Route::post('add-user', 'AdminController@addUser')->middleware('isAdmin');
        Route::post('logout', 'AuthController@logout');
    });
});
