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
	Route::post('/user/update/education/','Users\UserController@updateEducation')->name('update.education');
	Route::post('/user/create/education/','Users\UserController@createEducation')->name('create.education');
	Route::delete('/user/delete/education/{education}','Users\UserController@deleteEducation')->name('delete.education');

	//changing visibility of a user section
	Route::post('/user/change/section/visibility', 'Users\UserController@changeVisibility');
	//institution name autocomplete
	Route::get('/user/education/autocomplete','Users\UserController@eduAutocomplete')->name('edu.institution');
});

