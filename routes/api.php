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

Route::post('auth/login', 'Api\AuthController@login')->name('login');
Route::post('auth/register', 'Api\AuthController@register')->name('register');
Route::post('auth/reset-password', 'Api\AuthController@reset')->name('reset');

Route::get('am-i-online', 'Api\OnlineController')->name('online');

Route::middleware('auth:api')->group(function() {
    Route::apiResource('rooms', 'Api\RoomController');
    Route::apiResource('items', 'Api\ItemController');
    Route::apiResource('people', 'Api\PersonController');
    Route::apiResource('users', 'Api\ProfileController');
    Route::apiResource('saves', 'Api\SaveController');

    Route::apiResource('users','Api\UserController');
});
