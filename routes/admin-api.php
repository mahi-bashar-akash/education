<?php

use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------
| ADMIN API Routes
|-------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
|-------------------------------------------
| ADMIN AUTHENTICATION API ROUTES
|-------------------------------------------
*/

Route::group(
    ['middleware' => ['AdminAuth'], 'prefix' => 'admin-auth'],
    function () {
        Route::post('/login', [\App\Http\Controllers\AdminController::class, 'login'])->name('Admin.Auth.Login');
        Route::post('/register', [\App\Http\Controllers\AdminController::class, 'register'])->name('Admin.Auth.Register');
        Route::post('/forgot', [\App\Http\Controllers\AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');
        Route::post('/reset', [\App\Http\Controllers\AdminController::class, 'reset'])->name('Admin.Auth.Reset');
    }
);

/*
|-------------------------------------------
| ADMIN INSIDE CONTENT API ROUTES
|-------------------------------------------
*/

Route::group(
    ['middleware' => ['AdminAuthReq']],
    function () {

        /* ADMIN PROFILE API ROUTES */
        Route::group(
            ['prefix' => 'admin-profile'],
            function () {
                Route::get('/details', [\App\Http\Controllers\AdminController::class, 'profile_details'])->name('Admin.Profile.Details');
                Route::patch('/update', [\App\Http\Controllers\AdminController::class, 'profile_update'])->name('Admin.Profile.Update');
                Route::patch('/update/password', [\App\Http\Controllers\AdminController::class, 'profile_update_password'])->name('Admin.Profile.Update.Password');
                Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');
            }
        );

        /* ADMIN EVENT API ROUTES */
        Route::group(
            ['prefix' => 'event'],
            function () {
                Route::get('/list', [\App\Http\Controllers\EventController::class, 'list'])->name('Admin.Event.List');
                Route::post('/create', [\App\Http\Controllers\EventController::class, 'create'])->name('Admin.Event.Create');
                Route::put('/single', [\App\Http\Controllers\EventController::class, 'single'])->name('Admin.Event.Single');
                Route::patch('/update', [\App\Http\Controllers\EventController::class, 'update'])->name('Admin.Event.Update');
                Route::delete('/delete', [\App\Http\Controllers\EventController::class, 'delete'])->name('Admin.Event.Delete');
            }
        );

        /* ADMIN DEPARTMENT API ROUTES */
        Route::group(
            ['prefix' => 'department'],
            function () {
                Route::get('/list', [\App\Http\Controllers\DepartmentController::class, 'list'])->name('Admin.Department.List');
                Route::post('/create', [\App\Http\Controllers\DepartmentController::class, 'create'])->name('Admin.Department.Create');
                Route::put('/single', [\App\Http\Controllers\DepartmentController::class, 'single'])->name('Admin.Department.Single');
                Route::patch('/update', [\App\Http\Controllers\DepartmentController::class, 'update'])->name('Admin.Department.Update');
                Route::delete('/delete', [\App\Http\Controllers\DepartmentController::class, 'delete'])->name('Admin.Department.Delete');
            }
        );

        /* ADMIN PROFESSOR API ROUTES */
        Route::group(
            ['prefix' => 'professor'],
            function () {
                Route::get('/list', [\App\Http\Controllers\ProfessorController::class, 'list'])->name('Admin.Professor.List');
                Route::post('/create', [\App\Http\Controllers\ProfessorController::class, 'create'])->name('Admin.Professor.Create');
                Route::put('/single', [\App\Http\Controllers\ProfessorController::class, 'single'])->name('Admin.Professor.Single');
                Route::patch('/update', [\App\Http\Controllers\ProfessorController::class, 'update'])->name('Admin.Professor.Update');
                Route::delete('/delete', [\App\Http\Controllers\ProfessorController::class, 'delete'])->name('Admin.Professor.Delete');
            }
        );

        /* ADMIN COURSE API ROUTES */
        Route::group(
            ['prefix' => 'course'],
            function () {
                Route::get('/list', [\App\Http\Controllers\CourseController::class, 'list'])->name('Admin.Course.List');
                Route::post('/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('Admin.Course.Create');
                Route::put('/single', [\App\Http\Controllers\CourseController::class, 'single'])->name('Admin.Course.Single');
                Route::patch('/update', [\App\Http\Controllers\CourseController::class, 'update'])->name('Admin.Course.Update');
                Route::delete('/delete', [\App\Http\Controllers\CourseController::class, 'delete'])->name('Admin.Course.Delete');
            }
        );

        /* ADMIN BLOG API ROUTES */
        Route::group(
            ['prefix' => 'blog'],
            function () {
                Route::get('/list', [\App\Http\Controllers\BlogController::class, 'list'])->name('Admin.Blog.List');
                Route::post('/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('Admin.Blog.Create');
                Route::put('/single', [\App\Http\Controllers\BlogController::class, 'single'])->name('Admin.Blog.Single');
                Route::patch('/update', [\App\Http\Controllers\BlogController::class, 'update'])->name('Admin.Blog.Update');
                Route::delete('/delete', [\App\Http\Controllers\BlogController::class, 'delete'])->name('Admin.Blog.Delete');
            }
        );

        /* ADMIN STUDENT API ROUTES */
        Route::group(
            ['prefix' => 'student'],
            function () {
                Route::get('/list', [\App\Http\Controllers\StudentController::class, 'list'])->name('Admin.Student.List');
                Route::post('/create', [\App\Http\Controllers\StudentController::class, 'create'])->name('Admin.Student.Create');
                Route::put('/single', [\App\Http\Controllers\StudentController::class, 'single'])->name('Admin.Student.Single');
                Route::patch('/update', [\App\Http\Controllers\StudentController::class, 'update'])->name('Admin.Student.Update');
                Route::delete('/delete', [\App\Http\Controllers\StudentController::class, 'delete'])->name('Admin.Student.Delete');
            }
        );

        /* ADMIN LIBRARY ASSET API ROUTES */
        Route::group(
            ['prefix' => 'library/asset'],
            function () {
                Route::get('/list', [\App\Http\Controllers\LibraryAssetController::class, 'list'])->name('Admin.Library.Asset.List');
                Route::post('/create', [\App\Http\Controllers\LibraryAssetController::class, 'create'])->name('Admin.Library.Asset.Create');
                Route::put('/single', [\App\Http\Controllers\LibraryAssetController::class, 'single'])->name('Admin.Library.Asset.Single');
                Route::patch('/update', [\App\Http\Controllers\LibraryAssetController::class, 'update'])->name('Admin.Library.Asset.Update');
                Route::delete('/delete', [\App\Http\Controllers\LibraryAssetController::class, 'delete'])->name('Admin.Library.Asset.Delete');
            }
        );

        /* ADMIN STUFF API ROUTES */
        Route::group(
            ['prefix' => 'stuff'],
            function () {
                Route::get('/list', [\App\Http\Controllers\StuffController::class, 'list'])->name('Admin.Stuff.List');
                Route::post('/create', [\App\Http\Controllers\StuffController::class, 'create'])->name('Admin.Stuff.Create');
                Route::put('/single', [\App\Http\Controllers\StuffController::class, 'single'])->name('Admin.Stuff.Single');
                Route::patch('/update', [\App\Http\Controllers\StuffController::class, 'update'])->name('Admin.Stuff.Update');
                Route::delete('/delete', [\App\Http\Controllers\StuffController::class, 'delete'])->name('Admin.Stuff.Delete');
            }
        );

        /* ADMIN HOLIDAY API ROUTES */
        Route::group(
            ['prefix' => 'holiday'],
            function () {
                Route::get('/list', [\App\Http\Controllers\HolidayController::class, 'list'])->name('Admin.Holiday.List');
                Route::post('/create', [\App\Http\Controllers\HolidayController::class, 'create'])->name('Admin.Holiday.Create');
                Route::put('/single', [\App\Http\Controllers\HolidayController::class, 'single'])->name('Admin.Holiday.Single');
                Route::patch('/update', [\App\Http\Controllers\HolidayController::class, 'update'])->name('Admin.Holiday.Update');
                Route::delete('/delete', [\App\Http\Controllers\HolidayController::class, 'delete'])->name('Admin.Holiday.Delete');
            }
        );

        /* ADMIN FEES API ROUTES */
        Route::group(
            ['prefix' => 'fees'],
            function () {
                Route::get('/list', [\App\Http\Controllers\FeesController::class, 'list'])->name('Admin.Fees.List');
                Route::post('/create', [\App\Http\Controllers\FeesController::class, 'create'])->name('Admin.Fees.Create');
                Route::put('/single', [\App\Http\Controllers\FeesController::class, 'single'])->name('Admin.Fees.Single');
                Route::patch('/update', [\App\Http\Controllers\FeesController::class, 'update'])->name('Admin.Fees.Update');
                Route::delete('/delete', [\App\Http\Controllers\FeesController::class, 'delete'])->name('Admin.Fees.Delete');
            }
        );

        /* ADMIN FEES TYPES API ROUTES */
        Route::group(
            ['prefix' => 'fees/types'],
            function () {
                Route::get('/list', [\App\Http\Controllers\FeesTypesController::class, 'list'])->name('Admin.Fees.Types.List');
                Route::post('/create', [\App\Http\Controllers\FeesTypesController::class, 'create'])->name('Admin.Fees.Types.Create');
                Route::put('/single', [\App\Http\Controllers\FeesTypesController::class, 'single'])->name('Admin.Fees.Types.Single');
                Route::patch('/update', [\App\Http\Controllers\FeesTypesController::class, 'update'])->name('Admin.Fees.Types.Update');
                Route::delete('/delete', [\App\Http\Controllers\FeesTypesController::class, 'delete'])->name('Admin.Fees.Types.Delete');
            }
        );

        /* ADMIN PAYMENT API ROUTES */
        Route::group(
            ['prefix' => 'payment/types'],
            function () {
                Route::get('/list', [\App\Http\Controllers\PaymentTypesController::class, 'list'])->name('Admin.Payment.Types.List');
                Route::post('/create', [\App\Http\Controllers\PaymentTypesController::class, 'create'])->name('Admin.Payment.Types.Create');
                Route::put('/single', [\App\Http\Controllers\PaymentTypesController::class, 'single'])->name('Admin.Payment.Types.Single');
                Route::patch('/update', [\App\Http\Controllers\PaymentTypesController::class, 'update'])->name('Admin.Payment.Types.Update');
                Route::delete('/delete', [\App\Http\Controllers\PaymentTypesController::class, 'delete'])->name('Admin.Payment.Types.Delete');
            }
        );

        /* ADMIN PAYMENT STATUS API ROUTES */
        Route::group(
            ['prefix' => 'payment/status'],
            function () {
                Route::get('/list', [\App\Http\Controllers\PaymentStatusController::class, 'list'])->name('Admin.Payment.Status.List');
                Route::post('/create', [\App\Http\Controllers\PaymentStatusController::class, 'create'])->name('Admin.Payment.Status.Create');
                Route::put('/single', [\App\Http\Controllers\PaymentStatusController::class, 'single'])->name('Admin.Payment.Status.Single');
                Route::patch('/update', [\App\Http\Controllers\PaymentStatusController::class, 'update'])->name('Admin.Payment.Status.Update');
                Route::delete('/delete', [\App\Http\Controllers\PaymentStatusController::class, 'delete'])->name('Admin.Payment.Status.Delete');
            }
        );

    }
);
