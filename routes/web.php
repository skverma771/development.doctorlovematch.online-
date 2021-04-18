<?php

use App\Http\Controllers\StripeController;
use App\User;
//Route::get('/', function () {
//    return redirect('/admin/home');
//});
Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');

Route::view('/', 'index');
Route::view('/test', 'test');


Route::get('refresh_captcha', 'ApiController@refreshCaptcha')->name('refresh_captcha');
Route::view('/privacy', 'homep');

Route::get('/home', function () {
    return redirect('/dashboard');
});
Route::get('/privacy', function () {
    $country = \App\Country::all();
    $user =  User::with(['country', 'state', 'city'])
        ->whereHas('role', function ($users) {
            $users->where('title', '=','Subscriber');
        })
//        ->select('name','dob','pictures','status','ntcount')
        ->limit(10)->inRandomOrder()->get();



    return view('homep', compact('country','user'));
});


Route::get('/logoutnow', 'Api\V1\UsersController@logout');

// Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/login', function () {
    return redirect('/');
});
Route::post('/','Auth\LoginController@login')->name('auth.login');
//$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('login', 'Auth\LoginController@loginpage')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

// Registration Routes..
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});

Route::get('/', function () {
    $country = \App\Country::all();
    $user =  User::with(['country', 'state', 'city'])
        ->whereHas('role', function ($users) {
            $users->where('title', '=','Subscriber');
        })
//        ->select('name','dob','pictures','status','ntcount')
        ->limit(10)->inRandomOrder()->get();



    return view('index', compact('country','user'));
});
Route::get('my-components', function () {

    return view('my_components');

});


