<?php

use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\TemporaryWorkController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function () {
    //All Resource Controller
   
});

require __DIR__ . '/auth.php';

//For local, not for production
//Run fresh migration and seeder
if (env('Enable_Migration_Optimize_Clear_Routes') == true) {
    Route::get('run-migrations', function () {
        Artisan::call('migrate:fresh --seed');
        dd('migration and seeder done');
    });
    Route::get('optimize', function () {
        Artisan::call('optimize:clear');
        dd('optimize done');
    });
}
