<?php

use App\Http\Controllers\Admin\CowsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'AdminController@index');
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/Admin/user', [AdminController::class, 'AllUsers'])->name('admin.users');
Route::get('/Admin/user-block/{id}', [AdminController::class, 'Block_user'])->name('user.block');
Route::get('/Admin/user-unblock/{id}', [AdminController::class, 'Unblock_user'])->name('user.unblock');
Route::get('/profile', [HomeController::class, 'profile']);
Route::resource('/cow', CowsController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
