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
})->name('home');

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
    Route::post('/user/create/hobbies', 'Users\UserController@createHobbies')->name('create.hobbies');
    Route::delete('/user/delete/hobbie/{hobbie}', 'Users\UserController@deleteHobbie')->name('delete.hobbie');
    Route::get('/interest/{type}', 'Users\UserController@getInterests')->name('get.interest');

    //changing visibility of a user section
    Route::post('/user/change/section/visibility', 'Users\UserController@changeVisibility')->name('user.section.visibility');
    //institution name autocomplete
    Route::get('/user/education/autocomplete', 'Users\UserController@eduAutocomplete')->name('edu.institution');

    Route::group(['middleware' => 'isLecturer'], function () {
        // lecturer routes
        Route::post('/lecturer/update/bio', 'Users\UserController@updateBio')->name('lecturer.update.bio');
        Route::get('/lecturer/show/course/{course}', 'Courses\CourseController@showLecturerCourse')->name('lecturer.show.course');
        Route::get('/lecturer/module/{module?}/lections', 'Courses\ModuleController@showLecturerModule')->name('lecrurer.module.lections');

        //module
        Route::resource('module', 'Courses\ModuleController')->names('module');
        Route::post('module/add/student', 'Courses\ModuleController@addUser')->name('module.add.student');
        Route::post('module/remove/student', 'Courses\ModuleController@removeUser')->name('module.remove.student');

        //course routes
        Route::resource('course', 'Courses\CourseController')->names('course');

        //lection routes
        Route::resource('lection', 'Courses\LectionController')->names('lection');
        Route::post('change/lection/{lection}/visibility', 'Courses\LectionController@changeVisibility')->name('lection.visibility');
    });
});
Route::post('/lection/video/shown', 'Courses\LectionController@videoShown')->name('lection.video.show');

//user course operations
Route::get('/user/{user?}/course/{course}', 'Courses\CourseController@showUserCourse')->name('user.course');
Route::get('/user/{user?}/course/{course}/module/{module}/lections', 'Courses\LectionController@show')->name('user.module.lections');
Route::post('/user/{user?}/course/{course}/module/{module}/lection/{lection}/comment', 'Courses\LectionController@addComment')->name('user.module.lection.comment');
