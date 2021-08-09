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

Route::get('language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    \Cookie::forget('locale');
    Cookie::queue('locale', $lang, (60 * 60 * 24 * 365));
    return back();
})->name('langroute');

Route::get('/', function () {
    if (Session::get('locale') == 'en') {
        return view('static.en.home');
    }
    return view('static.home');
})->name('home');

// static pages
Route::get('/team', function () {
    if (Session::get('locale') == 'en') {
        return view('static.en.about');
    }
    return view('static.about');
})->name('about');

Route::get('/train-devs', function () {
    $type = App\Models\Courses\TrainingType::where('type','Програмиране')->first();
    if (Session::get('locale') == 'en') {
        return view('static.en.programming',['type' => $type->id]);
    }
    return view('static.programming',['type' => $type->id]);
})->name('programmingCourses');

Route::get('/digital-marketing', function () {
    $type = App\Models\Courses\TrainingType::where('type','Дигитален Маркетинг')->first();
    if (Session::get('locale') == 'en') {
        return view('static.digital_marketing',['type' => $type->id]);
    }
    return view('static.digital_marketing',['type' => $type->id]);
})->name('digitalMarketing');

Route::get('/quality-assurance', function () {
    $type = App\Models\Courses\TrainingType::where('type','QA')->first();
    if (Session::get('locale') == 'en') {
        return view('static.quality_assurance',['type' => $type->id]);
    }
    return view('static.quality_assurance',['type' => $type->id]);
})->name('qualityAssurance');

Route::get('/design', function () {
    $type = App\Models\Courses\TrainingType::where('type','Дизайн')->first();
    if (Session::get('locale') == 'en') {
        return view('static.en.design',['type' => $type->id]);
    }
    return view('static.design',['type' => $type->id]);
})->name('design');

Route::get('/mission-2', function () {
    if (Session::get('locale') == 'en') {
        return view('static.en.mission');
    }
    return view('static.mission');
})->name('mission');

Route::get('/reports', function () {
    if (Session::get('locale') == 'en') {
        return view('static.en.reports');
    }
    return view('static.reports');
})->name('year_reports');

Route::get('/contacts', function () {
    if (Session::get('locale') == 'en') {
        return view('static.en.contacts');
    }
    return view('static.contacts');
})->name('contacts');

Route::get('/subscribe/{email}', 'HomeController@subscribe');
Route::get('/course/payment/finish',function(){
        return view('course.paymentThankYouPage');
    })->name('course.payment.finish');

Auth::routes();

Route::get('/application/create/{type?}/{course?}/{module?}', function ($type, $course = null, $module = null) {
    return \Redirect::intended(config('consts.LMS_LOGIN') . '/' . \Request::path());
})->name('application.create');

Route::get('/{lang}/team', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('about');
})->where('lang', '(bg|en)');

Route::get('/{lang}/team', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('about');
})->where('lang', '(bg|en)');

Route::get('/{lang}/train-devs', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('programmingCourses');
})->where('lang', '(bg|en)');

Route::get('/{lang}/digital-marketing', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('digitalMarketing');
})->where('lang', '(bg|en)');

Route::get('/{lang}/mission-2', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('mission');
})->where('lang', '(bg|en)');

Route::get('/{lang}/reports', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('year_reports');
})->where('lang', '(bg|en)');

Route::get('/{lang}/contacts', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('contacts');
})->where('lang', '(bg|en)');
