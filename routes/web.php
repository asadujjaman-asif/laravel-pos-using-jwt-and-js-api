<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegister;
use App\Http\Middleware\TokenVerifyMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(UserRegister::class)->group(function(){
    //get request
    Route::get('/auth/login', 'loginView')->name('login');
    Route::get('/auth/register', 'registerView')->name('register');
    Route::get('/auth/otp', 'otpView')->name('otp');
    Route::get('/auth/verify/otp', 'verifyOTPView')->name('verifyOTP');
    Route::get('/auth/reset-password', 'passwordResetView')->name('reset-password');
    ///post request
    Route::post('/user-registration','userRegistration');
    Route::post('/user-login','login');
    Route::post('/otp-sent','sendOTPCode');
    Route::post('/verify-otp','verifyOTP');
    Route::post('/reset-password','resetPassword')->middleware([TokenVerifyMiddleware::class]);
});

Route::controller(DashboardController::class)->group(function(){
    //get request
    Route::get('/dashboard', 'AdminDashboard')->name('dashboard');
});