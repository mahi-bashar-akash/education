<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* --- --- --- --- api admin authentication --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuth'], 'prefix' => 'admin-auth'],
    function () {
        Route::post('/login', [AdminController::class, 'login'])->name('Admin.Auth.Login');
        Route::post('/register', [AdminController::class, 'register'])->name('Admin.Auth.Register');
        Route::post('/forgot', [AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');
        Route::post('/reset', [AdminController::class, 'reset'])->name('Admin.Auth.Reset');
    }
);

/* --- --- --- --- api admin profile --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'admin-profile'],
    function () {
        Route::get('/details', [AdminController::class, 'profile_details'])->name('Admin.Profile.Details');
        Route::patch('/update', [AdminController::class, 'profile_update'])->name('Admin.Profile.Update');
        Route::patch('/update/password', [AdminController::class, 'profile_update_password'])->name('Admin.Profile.Update.Password');
        Route::get('/logout', [AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');
    }
);
