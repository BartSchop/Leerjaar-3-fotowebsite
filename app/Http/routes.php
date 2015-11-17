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
Route::get('form/create', 'FormController@create');
Route::post('form/store', 'FormController@store');
Route::get('form', 'FormController@index');
Route::get('form/random', 'FormController@random');

//User Routes
Route::get('user/form', 'UserController@show');
Route::get('user/profile', 'UserController@index');
Route::post('admin/update/user/{id}', 'AdminController@update');

//Id routes
Route::get('form/update/{id}', 'FormController@update');
Route::get('report/form/{id}', 'AdminController@report');
Route::get('form/delete/{id}', 'FormController@destroy');
Route::get('form/like/{id}', 'FormController@like');
Route::post('comment/store/{id}', 'CommentController@store');
Route::get('form/comment/{id}', 'CommentController@index');
Route::get('form/edit/{id}', 'FormController@edit');
Route::get('form/{id}', 'FormController@show');
Route::get('admin/user/info/{id}', 'AdminController@show');
Route::post('form/update/store/{id}', 'FormController@updateForm');