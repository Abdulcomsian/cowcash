<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\UserCows;
use Auth;
use DB;

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
                    'coins_to_pay' => $toalcowscoins,
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
                    $User->silver_coins = $User->silver_coins - $cowcoins;
                    $User->save();
                    // toastSuccess('You have successfully purchased cow!');
                    // return back();
                }
            } else {
                echo "here";
                // toastError('You dont have enough coins to buy this cow');
                // return back();
            }
        } catch (\Exception $exception) {
            // toastError('Something went wrong,try again');
            // return back();
        }
    }

    //sold milk script
    public function sold_milk(Request $request)
    {
        $milk = 10;
        //let supoose 1 litter milk=5 coins
        $soldmilk = $milk * 5;
        $cows_id = 2;
        $cowsdetail = UserCows::where(['user_id' => 2, 'cow_id' => $cows_id])->first();
        if ($cowsdetail->total_milk >= $milk) {
            UserCows::where(['user_id' => 2, 'cow_id' => $cows_id])->update([
                'sold_milk' => DB::raw('sold_milk +' .  $milk . ''),
                'total_milk' => DB::raw('total_milk -' .  $milk . ''),
                'available_milk' => DB::raw('total_milk -0'),
            ]);
            $user = Auth::user();
            $user->silver_coins = $user->silver_coins + $soldmilk;
            $user->save();
        } else {
            echo "You have not sufficient milk for sold";
        }
    }
}
