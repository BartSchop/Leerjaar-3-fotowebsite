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


Route::get('/', 'FormController@index');
Route::post('/', 'FormController@sort');
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
Route::get('user/favorites', 'UserController@liked');
Route::post('admin/update/user/{id}', 'AdminController@update');
Route::get('admin/inbox', 'AdminController@index');
Route::post('search', 'FormController@search');
//Id routes
Route::get('form/update/{id}', 'FormController@update');
Route::get('report/form/{id}', 'AdminController@report');
Route::get('form/delete/{id}', 'FormController@destroy');
Route::get('form/like/{id}', 'FormController@like');

Route::get('form/comment/{id}', 'CommentController@index');
Route::get('form/edit/{id}', 'FormController@edit');
Route::get('form/{id}', 'FormController@show');
Route::get('admin/user/info/{id}', 'AdminController@show');
Route::post('form/update/store/{id}', 'FormController@updateForm');
Route::post('user/change/{id}', 'UserController@update');

Route::post('comment/store/{id}', 'CommentController@store');
Route::get('form/delete/confirm/{id}', 'FormController@destroyConfirm');
Route::get('comment/delete/{id}', 'CommentController@destroy');
Route::get('comment/update/{id}', 'CommentController@update');
Route::post('comment/update/store/{id}', 'CommentController@updateComment');
Route::post('admin/report/store/{id}', 'AdminController@store');
Route::get('message/{id}', 'AdminController@showMessage');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Route::get('home', 'FormController@index');