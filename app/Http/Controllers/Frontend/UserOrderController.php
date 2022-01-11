<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\UserCows;

class UserOrderController extends Controller
{

    //when user perchase cows from admin
    public function Take_order()
    {
        $cowcoins = 10000;
        $qty = 1;
        $toalcowscoins = $qty * $cowcoins;
        try {
            if (Auth::user()->silver_coins >= $toalcowscoins) {
                $usercoworder = UserOrder::create([
                    'user_id' => 2,
                    'cow_id' => 2,
                    'coins_to_pay' => $cowprice,
                    'qty' => $qty,
                    'status' => 1,
                ]);

                if ($usercoworder) {
                    UserCows::create([
                        'user_id' => 2,
                        'cow_id' => 2,
                        'per_hours_litters' => 10,
                        'total_milk' => 0,
                        'available_milk' => 0,
                        'sold_milk' => 0,
                        'status' => 1,
                    ]);

                    //deduct coins fron user when purchase cows
                    $User = Auth::user();
                    $user->silver_coins = $user->silver_coins - $cowcoins;
                    $user->save();
                    // toastSuccess('You have successfully purchased cow!');
                    // return back();
                }
            } else {
                toastError('You dont have enough coins to buy this cow');
                return back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
}
