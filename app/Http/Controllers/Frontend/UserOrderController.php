<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cows;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\UserCows;
use Auth;
use DB;

class UserOrderController extends Controller
{

    //profile
    public function Profile()
    {
        return view('Frontend.profile');
    }
    //settings
    public function Settings()
    {
        return view('Frontend.setting');
    }
    //Bonus
    public function Bonus()
    {
        return view('Frontend.daily-bonus');
    }
    //referal
    public function Referal()
    {
        return view('Frontend.myreferals');
    }
    //when user perchase cows from admin
    public function Take_order(Request $request)
    {
        //check if cows exist or not
        try {
            $cow = Cows::find($request->item);
            if ($cow) {
                $cowcoins = $cow->price;
                $qty = $request->qty;
                $toalcowscoins = $qty * $cowcoins;
                if (Auth::user()->silver_coins >= $toalcowscoins) {
                    //check if cow alread purchase update hte qty
                    $checkperchase = UserCows::where('cow_id', $request->item)->first();
                    if (!$checkperchase) {
                        $usercoworder = UserOrder::create([
                            'user_id' => Auth::user()->id,
                            'cow_id' => $cow->id,
                            'coins_to_pay' => $toalcowscoins,
                            'qty' => $qty,
                            'status' => 1,
                        ]);
                        if ($usercoworder) {
                            UserCows::create([
                                'user_id' => Auth::user()->id,
                                'cow_id' => $cow->id,
                                'qty' => $qty,
                                'per_hours_litters' => $cow->litters,
                                'total_milk' => 0,
                                'available_milk' => 0,
                                'sold_milk' => 0,
                                'collect_per_hour_milk' => 0,
                                'status' => 1,
                            ]);
                            //deduct coins fron user when purchase cows
                            $User = Auth::user();
                            $User->silver_coins = $User->silver_coins - $toalcowscoins;
                            $User->save();
                            toastSuccess('You have successfully purchased cow!');
                            return redirect('account/farm');
                        }
                    } else {
                        $usercoworder = UserOrder::where('cow_id', $request->item)->update([
                            'qty' =>  DB::raw('qty +' .  $qty . ''),
                        ]);
                        if ($usercoworder) {
                            UserCows::where('cow_id', $request->item)->update([
                                'qty' => DB::raw('qty +' .  $qty . ''),
                            ]);
                            //deduct coins fron user when purchase cows
                            $User = Auth::user();
                            $User->silver_coins = $User->silver_coins - $toalcowscoins;
                            $User->save();
                            toastSuccess('You have successfully purchased cow!');
                            return redirect('account/farm');
                        }
                    }
                } else {
                    toastError('You dont have enough coins to buy this cow');
                    return back();
                }
            } else {
                toastError('Now Cows Found Suspecious Data Found!!!!');
                return back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    //sold milk script
    public function sold_milk(Request $request)
    {
        try {
            //check if cows is purchased or not for security purpose
            $totalmilk = 0;
            foreach ($request->item as $item) {
                $checkcows = UserCows::where(['user_id' => Auth::user()->id, 'id' => $item])->first();
                if (!$checkcows) {
                    $totalmilk = $totalmilk + $checkcows->total_milk;
                    toastError('Some Cows is not in your order Warning!!!!!!!');
                    return back();
                }
            }
            if ($totalmilk) {
                foreach ($request->item as $item) {
                    $checkcows = UserCows::where(['user_id' => Auth::user()->id, 'id' => $item])->first();
                    if ($checkcows) {
                        $milk = $checkcows->total_milk;
                        //let supoose 1 litter milk=5 coins
                        $coins = $milk / 1;
                        UserCows::where(['user_id' => Auth::user()->id, 'cow_id' => $checkcows->cow_id])->update([
                            'sold_milk' => DB::raw('sold_milk +' .  $milk . ''),
                            'total_milk' => DB::raw('total_milk -' .  $milk . ''),
                            'available_milk' => DB::raw('total_milk -0'),
                        ]);
                        $user = Auth::user();
                        $user->silver_coins = $user->silver_coins +  $coins;
                        $user->save();
                    }
                }
                toastSuccess('Milk Sold Successfully!!!');
                return back();
            } else {
                toastError('You have nothing to sell');
                return back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
}
