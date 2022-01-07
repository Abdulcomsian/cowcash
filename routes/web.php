<?php

use App\Http\Controllers\Admin\CowsController;
use App\Http\Controllers\Admin\PackagesController;
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

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'Admin'], function () {
    //cows work
    Route::resource('/cow', CowsController::class);
    //packages work 
    Route::resource('/packages', PackagesController::class);
    Route::get('/pkg-transactions', [PackagesController::class, 'pkg_Transactions'])->name('pkg.transaction');
    Route::delete('/transactions-delete/{id}', [PackagesController::class, 'pkg_Transactions_delete'])->name('packages.delete-transc');

    //Admin Routes
    Route::get('/user', [AdminController::class, 'AllUsers'])->name('admin.users');
    Route::get('/user-block/{id}', [AdminController::class, 'Block_user'])->name('user.block');
    Route::get('/user-unblock/{id}', [AdminController::class, 'Unblock_user'])->name('user.unblock');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
