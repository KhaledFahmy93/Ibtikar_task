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

Route::middleware('guest')->group(function () {
    Route::post('login', 'Api\LoginController')->name('login');
    Route::post('register', 'Api\RegisterController')->name('register');
});

Route::group(['middleware' => 'api' ,'namespace' => 'Api'], function () {
    Route::post('tweet', 'TweetController@store');
    Route::post('follow','FollowController@follow');
    Route::get('timeline' , 'FollowController@timeLine');
});
