<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------
| USER API Routes
|-------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
|-------------------------------
| API USER AUTHENTICATION
|-------------------------------
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
|-------------------------------
| API USER PROFILE
|-------------------------------
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

/*
|-------------------------------
| API GLOBAL BLOG
|-------------------------------
*/

Route::group(

    ['prefix' => 'global'],

    function () {

        /* BLOG API ROUTES */
        Route::get('/blogs', [\App\Http\Controllers\BlogController::class, 'blogList'])->name('Global.Blogs.List');
        Route::get('/blogs/{id}', [\App\Http\Controllers\BlogController::class, 'blogDetails'])->name('Global.Events.Single.Details');

        /* EVENT API ROUTES */
        Route::get('/events', [\App\Http\Controllers\EventController::class, 'eventList'])->name('Global.Events.List');
        Route::get('/events/{id}', [\App\Http\Controllers\EventController::class, 'eventDetails'])->name('Global.Events.Single.Details');

        /* COURSES API ROUTES */
        Route::get('/courses', [\App\Http\Controllers\CourseController::class, 'courseList'])->name('Global.Courses.List');
        Route::get('/courses/{id}', [\App\Http\Controllers\CourseController::class, 'courseDetails'])->name('Global.Courses.Single.Details');

        /* PROFESSORS API ROUTES */
        Route::get('/professors', [\App\Http\Controllers\ProfessorController::class, 'professorList'])->name('Global.Professors.List');
        Route::get('/professors/{id}', [\App\Http\Controllers\ProfessorController::class, 'professorDetails'])->name('Global.Professors.Single.Details');

        /* STUDENTS API ROUTES */
        Route::get('/students', [\App\Http\Controllers\StudentController::class, 'studentList'])->name('Global.Students.List');
        Route::get('/students/{id}', [\App\Http\Controllers\StudentController::class, 'studentDetails'])->name('Global.Students.Single.Details');

        /* DEPARTMENTS API ROUTES */
        Route::get('/departments', [\App\Http\Controllers\DepartmentController::class, 'departmentList'])->name('Global.Department.List');
        Route::get('/departments/{id}', [\App\Http\Controllers\DepartmentController::class, 'departmentDetails'])->name('Global.Department.Single.Details');

        /* LIBRARY ASSET API ROUTES */
        Route::get('/library-assets', [\App\Http\Controllers\LibraryAssetController::class, 'libraryAssetList'])->name('Global.Library.Asset.List');
        Route::get('/library-assets/{id}', [\App\Http\Controllers\LibraryAssetController::class, 'libraryAssetDetails'])->name('Global.Library.Asset.Single.Details');

        /* STUFFS API ROUTES */
        Route::get('/stuffs', [\App\Http\Controllers\StuffController::class, 'stuffList'])->name('Global.Department.List');
        Route::get('/stuffs/{id}', [\App\Http\Controllers\StuffController::class, 'stuffDetails'])->name('Global.Department.Single.Details');

    }

);
