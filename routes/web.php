<?php

use App\Http\Controllers\Admin\CowsController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\UserOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use PhpParser\Node\Expr\FuncCall;


//front end home page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin middlewware and admin routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'Admin'], function () {
    Route::resource('/cow', CowsController::class);
    Route::resource('/packages', PackagesController::class);
    Route::get('/pkg-transactions', [PackagesController::class, 'pkg_Transactions'])->name('pkg.transaction');
    Route::delete('/transactions-delete/{id}', [PackagesController::class, 'pkg_Transactions_delete'])->name('packages.delete-transc');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/user', [AdminController::class, 'AllUsers'])->name('admin.users');
    Route::get('/user-block/{id}', [AdminController::class, 'Block_user'])->name('user.block');
    Route::get('/user-unblock/{id}', [AdminController::class, 'Unblock_user'])->name('user.unblock');
    Route::get('/user-cow-details/{id}', [AdminController::class, 'User_cow_details'])->name('user.cow.details');
    Route::get('/user-referal-details/{id}', [AdminController::class, 'User_referal_details'])->name('user.referral.details');
    //Admin Dashboard
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
});

//frontend Farmer user routes here
Route::group(['middleware' => ['auth'], 'prefix' => 'User'], function () {
    Route::get('/take-order', [UserOrderController::class, 'Take_order'])->name('user.take.order');
});

Auth::routes();


//route for calculating hour per milk using cron job
Route::get('calculate-milk-per-houre', [HomeController::class, 'calculate_milk_per_hour'])->name('calculate.milk');
