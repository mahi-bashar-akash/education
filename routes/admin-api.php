<?php

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

/* --- --- --- --- Admin authentication api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuth'], 'prefix' => 'admin-auth'],
    function () {
        Route::post('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('Admin.Auth.Login');
        Route::post('/register', [\App\Http\Controllers\AdminController::class, 'register'])->name('Admin.Auth.Register');
        Route::post('/forgot', [\App\Http\Controllers\AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');
        Route::post('/reset', [\App\Http\Controllers\AdminController::class, 'reset'])->name('Admin.Auth.Reset');
    }
);

/* --- --- --- --- Profile api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'admin-profile'],
    function () {
        Route::get('/details', [\App\Http\Controllers\AdminController::class, 'profile_details'])->name('Admin.Profile.Details');
        Route::patch('/update', [\App\Http\Controllers\AdminController::class, 'profile_update'])->name('Admin.Profile.Update');
        Route::patch('/update/password', [\App\Http\Controllers\AdminController::class, 'profile_update_password'])->name('Admin.Profile.Update.Password');
        Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');
    }
);

/* --- --- --- --- Department api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'department'],
    function () {
        Route::get('/list', [\App\Http\Controllers\DepartmentController::class, 'list'])->name('Admin.Department.List');
        Route::post('/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('Admin.Department.Create');
        Route::put('/single', [\App\Http\Controllers\DepartmentController::class, 'single'])->name('Admin.Department.Single');
        Route::patch('/update', [\App\Http\Controllers\DepartmentController::class, 'update'])->name('Admin.Department.Update');
        Route::delete('/delete', [\App\Http\Controllers\DepartmentController::class, 'delete'])->name('Admin.Department.Delete');
    }
);

/* --- --- --- --- Professor api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'professor'],
    function () {
        Route::get('/list', [\App\Http\Controllers\ProfessorController::class, 'list'])->name('Admin.Professor.List');
        Route::post('/create', [\App\Http\Controllers\ProfessorController::class, 'create'])->name('Admin.Professor.Create');
        Route::put('/single', [\App\Http\Controllers\ProfessorController::class, 'single'])->name('Admin.Professor.Single');
        Route::patch('/update', [\App\Http\Controllers\ProfessorController::class, 'update'])->name('Admin.Professor.Update');
        Route::delete('/delete', [\App\Http\Controllers\ProfessorController::class, 'delete'])->name('Admin.Professor.Delete');
    }
);
