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

    // users education section
    Route::post('/user/create/education/', 'Users\UserController@createEducation')->name('create.education');
    Route::post('/user/update/education/', 'Users\UserController@updateEducation')->name('update.education');
    Route::delete('/user/delete/education/{education}', 'Users\UserController@deleteEducation')->name('delete.education');

    //users work experience section
    Route::post('/user/create/work/experience', 'Users\UserController@createWorkExperience')->name('create.work.experience');
    Route::post('/user/update/work/experience', 'Users\UserController@updateWorkExperience')->name('update.work.experience');
    Route::delete('/user/delete/work/{experience}', 'Users\UserController@deleteWorkExperience')->name('delete.work.experience');

    //users hobbies/interests section
    // Route::post('/user/create/work/experience', 'Users\UserController@createWorkExperience')->name('create.work.experience');
    // Route::post('/user/update/work/experience', 'Users\UserController@updateWorkExperience')->name('update.work.experience');
    Route::delete('/user/delete/hobbie/{hobbie}', 'Users\UserController@deleteHobbie')->name('delete.hobbie');


    //changing visibility of a user section
    Route::post('/user/change/section/visibility', 'Users\UserController@changeVisibility');
    //institution name autocomplete
    Route::get('/user/education/autocomplete', 'Users\UserController@eduAutocomplete')->name('edu.institution');
});
