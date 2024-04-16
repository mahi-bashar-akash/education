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

/* --- --- --- --- Event api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'event'],
    function () {
        Route::get('/list', [\App\Http\Controllers\EventController::class, 'list'])->name('Admin.Event.List');
        Route::post('/create', [\App\Http\Controllers\EventController::class, 'create'])->name('Admin.Event.Create');
        Route::put('/single', [\App\Http\Controllers\EventController::class, 'single'])->name('Admin.Event.Single');
        Route::patch('/update', [\App\Http\Controllers\EventController::class, 'update'])->name('Admin.Event.Update');
        Route::delete('/delete', [\App\Http\Controllers\EventController::class, 'delete'])->name('Admin.Event.Delete');
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

/* --- --- --- --- Course api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'course'],
    function () {
        Route::get('/list', [\App\Http\Controllers\CourseController::class, 'list'])->name('Admin.Course.List');
        Route::post('/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('Admin.Course.Create');
        Route::put('/single', [\App\Http\Controllers\CourseController::class, 'single'])->name('Admin.Course.Single');
        Route::patch('/update', [\App\Http\Controllers\CourseController::class, 'update'])->name('Admin.Course.Update');
        Route::delete('/delete', [\App\Http\Controllers\CourseController::class, 'delete'])->name('Admin.Course.Delete');
    }
);

/* --- --- --- --- Student api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'student'],
    function () {
        Route::get('/list', [\App\Http\Controllers\StudentController::class, 'list'])->name('Admin.Student.List');
        Route::post('/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('Admin.Student.Create');
        Route::put('/single', [\App\Http\Controllers\StudentController::class, 'single'])->name('Admin.Student.Single');
        Route::patch('/update', [\App\Http\Controllers\StudentController::class, 'update'])->name('Admin.Student.Update');
        Route::delete('/delete', [\App\Http\Controllers\StudentController::class, 'delete'])->name('Admin.Student.Delete');
    }
);

/* --- --- --- --- Library asset api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'library/asset'],
    function () {
        Route::get('/list', [\App\Http\Controllers\LibraryAssetController::class, 'list'])->name('Admin.Library.Asset.List');
        Route::post('/create', [\App\Http\Controllers\LibraryAssetController::class, 'create'])->name('Admin.Library.Asset.Create');
        Route::put('/single', [\App\Http\Controllers\LibraryAssetController::class, 'single'])->name('Admin.Library.Asset.Single');
        Route::patch('/update', [\App\Http\Controllers\LibraryAssetController::class, 'update'])->name('Admin.Library.Asset.Update');
        Route::delete('/delete', [\App\Http\Controllers\LibraryAssetController::class, 'delete'])->name('Admin.Library.Asset.Delete');
    }
);

/* --- --- --- --- Stuff api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'stuff'],
    function () {
        Route::get('/list', [\App\Http\Controllers\StuffController::class, 'list'])->name('Admin.Stuff.List');
        Route::post('/create', [\App\Http\Controllers\StuffController::class, 'create'])->name('Admin.Stuff.Create');
        Route::put('/single', [\App\Http\Controllers\StuffController::class, 'single'])->name('Admin.Stuff.Single');
        Route::patch('/update', [\App\Http\Controllers\StuffController::class, 'update'])->name('Admin.Stuff.Update');
        Route::delete('/delete', [\App\Http\Controllers\StuffController::class, 'delete'])->name('Admin.Stuff.Delete');
    }
);

/* --- --- --- --- Holiday api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'holiday'],
    function () {
        Route::get('/list', [\App\Http\Controllers\HolidayController::class, 'list'])->name('Admin.Holiday.List');
        Route::post('/create', [\App\Http\Controllers\HolidayController::class, 'create'])->name('Admin.Holiday.Create');
        Route::put('/single', [\App\Http\Controllers\HolidayController::class, 'single'])->name('Admin.Holiday.Single');
        Route::patch('/update', [\App\Http\Controllers\HolidayController::class, 'update'])->name('Admin.Holiday.Update');
        Route::delete('/delete', [\App\Http\Controllers\HolidayController::class, 'delete'])->name('Admin.Holiday.Delete');
    }
);

/* --- --- --- --- Fees api --- --- --- --- */
Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'fees'],
    function () {
        Route::get('/list', [\App\Http\Controllers\FeesController::class, 'list'])->name('Admin.Fees.List');
        Route::post('/create', [\App\Http\Controllers\FeesController::class, 'create'])->name('Admin.Fees.Create');
        Route::put('/single', [\App\Http\Controllers\FeesController::class, 'single'])->name('Admin.Fees.Single');
        Route::patch('/update', [\App\Http\Controllers\FeesController::class, 'update'])->name('Admin.Fees.Update');
        Route::delete('/delete', [\App\Http\Controllers\FeesController::class, 'delete'])->name('Admin.Fees.Delete');
    }
);
