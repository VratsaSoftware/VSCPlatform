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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/myProfile', 'HomeController@index')->name('myProfile');
	Route::resource('user', 'Users\UserController')->names('user');
	Route::post('/user/education/','Users\UserController@updateEducation')->name('update.education');
});

