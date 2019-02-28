<?php

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

Route::get('/', function () {
    return view('signup');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('signup/create', 'Admin\SignupController@add');
    Route::post('signup/create', 'Admin\SignupController@create');
});
