<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;

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

//Route::get('/', function () { return view('welcome'); } );

/*
|--------------------------------------------------------------------------
|---- Admin Auth Routes ---------------------------------------------------
|--------------------------------------------------------------------------
*/

Route::get('admin/auth/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.auth');

Route::get('admin/auth', function () { return redirect()->route('lvs.admin.auth', 'login'); } );

/*
|--------------------------------------------------------------------------
|---- Admin Routes --------------------------------------------------------
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin');

Route::get('/admin/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.any');

Route::get('/admin', function () { return redirect()->route('lvs.admin.any', 'dashboard'); } );

/*
|--------------------------------------------------------------------------
|---- Front Routes --------------------------------------------------------
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front');

Route::get('/{any}', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front.any');

Route::get('/', function () { return redirect()->route('lvs.front.any', 'home'); } );
