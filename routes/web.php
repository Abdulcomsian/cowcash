<?php

use App\Http\Controllers\Admin\CowsController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\FarmController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\IpnPayeerController;
use App\Http\Controllers\Frontend\PaymentPayeerController;
use App\Http\Controllers\Frontend\FaucetPayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Country;
use App\Models\Payment;
use App\Models\PayOff;






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



// Frontend user farmer work


//front end home page without login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/payments', function () {
    $payments=PayOff::with('user')->where(['status'=>1,'gateway'=>'P'])->orderBy('id', 'desc')->take(20)->get();
    return view('Frontend.payments',compact('payments'));
});
Route::get('/rules', function () {
    return view('Frontend.rules');
});
Route::get('/about', function () {
    return view('Frontend.about');
});
Route::get('/support', function () {
    return view('Frontend.support');
});
Route::get('account/promo_material', function () {
    return view('Frontend.promo_material');
});
Route::get('account/swap', function () {
    return view('Frontend.swap');
});
Route::get('/order_payoff', function () {
    return view('Frontend.order_payoff');
});
Route::get('/crystal', function () {
    return view('Frontend.crystal');
});
Route::get('/order_card', function () {
    return view('Frontend.order_payoff_card');
});
Route::get('/faq', function () {
    return view('Frontend.faq');
});
Route::get('account/calculate', [FarmController::class, 'calculate'])->name('account.calculate');






// registraion url
Route::get('account/registration', [UserOrderController::class, 'registration']);
    


Route::group(['middleware' => ['auth'], 'prefix' => 'account'], function () {
    //cow shop
    Route::get('/farm', [FarmController::class, 'index'])->name('account.farm');
    Route::post('/take-order', [UserOrderController::class, 'Take_order'])->name('user.take.order');
    Route::get('/store', [FarmController::class, 'milk_wearhouse'])->name('account.wearhouse');
    Route::post('/collect-milk', [FarmController::class, 'collect_milk'])->name('collect.milk');
    Route::get('/market', [FarmController::class, 'Sell_milk'])->name('account.market');
    Route::post('/sold-milk', [UserOrderController::class, 'sold_milk'])->name('account.sold.milk');
    Route::get('/',  [UserOrderController::class, 'Profile'])->name('account');
    Route::get('/settings', [UserOrderController::class, 'Settings'])->name('account.settings');
    Route::get('/bonus', [UserOrderController::class, 'Bonus'])->name('account.bonus');
    Route::post('/collect-bonus', [UserOrderController::class, 'Collect_Bonus'])->name('account.collectbonus');
    Route::get('/referal', [UserOrderController::class, 'Referal'])->name('account.referal');
    Route::get('/swap', [UserOrderController::class, 'Swap'])->name('account.swap');
    Route::post('/swap', [UserOrderController::class, 'SwapExchange'])->name('account.swap.exchange');
    Route::get('/coins', [FarmController::class, 'coins'])->name('account.coins');
    Route::get('/payment', function () {
        return view('Frontend.payment');
    });
    Route::get('/payment/{id}', [UserOrderController::class, 'payment']);

    //update password
    Route::post('/update-password', [UserOrderController::class, 'updatePassword'])->name('account.update-password');
    Route::post('/update-currency', [UserOrderController::class, 'updateCurrency'])->name('account.update-currency');
    Route::post('/update-email', [UserOrderController::class, 'updateEmail'])->name('account.update-email');
    Route::get('/promotion', function () {
        return view('Frontend.referal-promotions');
    });
});

Route::group(['middleware' => ['auth']], function () {
    //Payeer Payment Work here
    Route::get('/success', [IpnPayeerController::class, 'Payment_Success']);
    Route::get('/fail', [IpnPayeerController::class, 'Payment_Fail']);
    Route::get('/status', [IpnPayeerController::class, 'Payment_Status']);
    Route::post('/createPayment', [PaymentPayeerController::class, 'createPayment']);
    Route::post('/payoff', [PaymentPayeerController::class, 'payoff']);

    //faucet work here
    Route::post('/send',[FaucetPayController::class,'sendpay'])->name('send');
    Route::post('/btc',[FaucetPayController::class,'sendpaybtc'])->name('btc');

    Route::get('/faucet-success',[FaucetPayController::class,'sucess'])->name('faucet.sucess');
    Route::get('/faucet-cancel',[FaucetPayController::class,'cancel'])->name('faucet.cancel');
    Route::get('/faucet-callback',[FaucetPayController::class,'callback'])->name('faucet.callback');
});


Auth::routes(['verify' => true]);

//route for calculating hour per milk using cron job
Route::get('calculate-milk-per-houre', [HomeController::class, 'calculate_milk_per_hour'])->name('calculate.milk');
