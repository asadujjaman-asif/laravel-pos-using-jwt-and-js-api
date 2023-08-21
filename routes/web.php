<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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
    //Start here logout route
    Route::get('/logout', 'logout')->name('logout');
    ///post request
    Route::post('/user-registration','userRegistration');
    Route::post('/user-login','login');
    Route::post('/otp-sent','sendOTPCode');
    Route::post('/verify-otp','verifyOTP');
    Route::post('/reset-password','resetPassword')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/get-profile', 'getUserProfile')->name('get-profile')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/update-user-profile', 'updateUserProfile')->name('update-user-profile')->middleware([TokenVerifyMiddleware::class]);
});


Route::controller(DashboardController::class)->group(function(){
    //get request
    Route::get('/dashboard', 'AdminDashboard')->name('dashboard')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/user-profile', 'userProfile')->name('user-profile')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/get-last-login', 'getLastLogin')->name('get-last-login')->middleware([TokenVerifyMiddleware::class]);
});
Route::controller(BrandController::class)->group(function(){
    //get request
    Route::get('/brand-list', 'BrandList')->name('brand-list')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/get-brand', 'getBrand')->name('get-brand')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/create-brand', 'createBrand')->name('create-brand')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/brand-by-id', 'BrandyById')->name('brand-by-id')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/update-brand', 'updateBrand')->name('update-brand')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/delete-brand', 'deleteBrand')->name('delete-brand')->middleware([TokenVerifyMiddleware::class]);
});