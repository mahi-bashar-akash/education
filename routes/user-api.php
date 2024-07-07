<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| API USER AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::group(
    ['middleware' => ['UserAuth'], 'prefix' => 'user-auth'],
    function () {
        Route::post('/login', [FrontController::class, 'login'])->name('User.Auth.Login');
        Route::post('/register', [FrontController::class, 'register'])->name('User.Auth.Register');
        Route::post('/forgot', [FrontController::class, 'forgot'])->name('User.Auth.Forgot');
        Route::post('/reset', [FrontController::class, 'reset'])->name('User.Auth.Reset');
    }
);

/*
|--------------------------------------------------------------------------
| API USER PROFILE
|--------------------------------------------------------------------------
*/

Route::group(
    ['middleware' => ['UserAuthReq'], 'prefix' => 'user-profile'],
    function () {
        Route::get('/details', [FrontController::class, 'profile_details'])->name('User.Profile.Details');
        Route::patch('/update', [FrontController::class, 'profile_update'])->name('User.Profile.Update');
        Route::patch('/update/password', [FrontController::class, 'profile_update_password'])->name('User.Profile.Update.Password');
        Route::patch('/update/payment', [FrontController::class, 'profile_update_payment'])->name('User.Profile.Update.payment');
        Route::get('/logout', [FrontController::class, 'profile_logout'])->name('User.Profile.Logout');
    }
);
