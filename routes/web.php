<?php

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
Route::controller(CategoryController::class)->group(function(){
    //get request
    Route::get('/category-list', 'categoryList')->name('category-list')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/get-category', 'getCategory')->name('get-category')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/create-category', 'createCategory')->name('create-category')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/edit-category', 'editCategory')->name('edit-category')->middleware([TokenVerifyMiddleware::class]);
    Route::post('/update-category', 'updateCategory')->name('update-category')->middleware([TokenVerifyMiddleware::class]);
    Route::get('/delete-category', 'deleteCategory')->name('delete-category')->middleware([TokenVerifyMiddleware::class]);
});