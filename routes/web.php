<?php

use App\Http\Controllers\Admin\CowsController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\UserOrderController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


//Admin middlewware and admin routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'Admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    //cows work
    Route::resource('/cow', CowsController::class);
    //packages work 
    Route::resource('/packages', PackagesController::class);
    //
    Route::get('/pkg-transactions', [PackagesController::class, 'pkg_Transactions'])->name('pkg.transaction');
    Route::delete('/transactions-delete/{id}', [PackagesController::class, 'pkg_Transactions_delete'])->name('packages.delete-transc');

    //Admin Routes
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/user', [AdminController::class, 'AllUsers'])->name('admin.users');
    Route::get('/user-block/{id}', [AdminController::class, 'Block_user'])->name('user.block');
    Route::get('/user-unblock/{id}', [AdminController::class, 'Unblock_user'])->name('user.unblock');
    Route::get('/user-cow-details/{id}', [AdminController::class, 'User_cow_details'])->name('user.cow.details');
});

//frontend user routes here
Route::group(['middleware' => ['auth'], 'prefix' => 'User'], function () {
    Route::get('/take-order', [UserOrderController::class, 'Take_order'])->name('user.take.order');
});

Auth::routes();


//route for calculating hour per milk
Route::get('calculate-milk-per-houre', [HomeController::class, 'calculate_milk_per_hour'])->name('calculate.milk');
