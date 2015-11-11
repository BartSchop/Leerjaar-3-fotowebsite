<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//Forms routes...
Route::get('form/comment', 'CommentController@index');
Route::get('form/create', 'FormController@create');
Route::post('form/store', 'FormController@store');
Route::get('form', 'FormController@index');
Route::post('form/update', 'FormController@update');
Route::get('user/form', 'UserController@index');
Route::get('form/edit/{id}', 'FormController@edit');
Route::get('form/{id}', 'FormController@show');
