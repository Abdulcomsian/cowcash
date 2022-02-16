<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cows;
use Illuminate\Http\Request;
use App\Models\UserOrder;
use App\Models\UserCows;
use App\Models\User;
use App\Utils\Validations;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use Carbon\Carbon;

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
        $currentDateTime = Carbon::now();
        if ($currentDateTime > Auth::user()->bonus_time) {
            Auth::user()->update([
                'bonus_status' => 0,
            ]);
        }
        return view('Frontend.daily-bonus');
    }
    //collect bounus after 12 hours
    public function Collect_Bonus(Request $request)
    {
        $currentDateTime = Carbon::now();
        if ($currentDateTime > Auth::user()->bonus_time) {
            if (Auth::user()->bonus_status == 0) {
                $bonuscoins = rand(2, 100);
                $newDateTime = Carbon::now()->addHour(12);
                Auth::user()->update([
                    'bonus_status' => 1,
                    'bonus_time' => $newDateTime,
                    'silver_coins' => DB::raw('silver_coins +' .  $bonuscoins . ''),
                ]);
                toastSuccess('You have got ' . $bonuscoins . ' silver coins');
                return back();
            }
        } else {
            toastError('You can collect bounus coins after 12 hours');
            return back();
        }
    }
    //referal
    public function Referal()
    {
        $userreferal = User::where('referred_by', Auth::user()->affiliate_id)->get();
        return view('Frontend.myreferals', compact('userreferal'));
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
                if ($checkcows) {
                    $totalmilk = $totalmilk + $checkcows->total_milk;
                } else {
                    toastError('Some Cows is not in your order Warning!!!!!!!');
                    return back();
                }
            }
            if ($totalmilk) {
                foreach ($request->item as $item) {
                    $checkcows = UserCows::where(['user_id' => Auth::user()->id, 'id' => $item])->first();
                    if ($checkcows) {
                        $milk = $checkcows->total_milk;
                        UserCows::where(['user_id' => Auth::user()->id, 'cow_id' => $checkcows->cow_id])->update([
                            'sold_milk' => DB::raw('sold_milk +' .  $milk . ''),
                            'total_milk' => DB::raw('total_milk -' .  $milk . ''),
                            'available_milk' => DB::raw('total_milk -0'),
                        ]);
                        //let supoose 100 litter milk=1 silver coins
                        $silvercoins = $milk / 100 * 70;
                        $goldcoins = $milk / 100 * 30;
                        $user = Auth::user();
                        $user->silver_coins = $user->silver_coins +  $silvercoins;
                        $user->withdraw = $user->withdraw + $goldcoins;
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
    //update password
    public function updatePassword(Request $request, User $user)
    {
        Validations::updateUserPassword($request);
        try {
            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->oldpassword, $hashedPassword)) {
                $all_inputs['password'] = Hash::make($request->password);
                Auth::user()->update([
                    'password' => $all_inputs['password'],
                ]);
                toastSuccess('Password updated successfully');
                return Redirect::back();
            } else {
                toastError('Old Password is incorrect!');
                return Redirect::back();
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //update currency
    public function updateCurrency(Request $request)
    {
        try {
            Auth::user()->update([
                'currency' => $request->currency,
            ]);
            toastSuccess('Currency updated successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //update email
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        try {
            Auth::user()->update([
                'email' => $request->email,
            ]);
            toastSuccess('Em updated successfully');
            return Redirect::back();
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }
    //exchagne coins
    public function Swap()
    {
        return view('Frontend.swap');
    }
    //swap coins
    public function SwapExchange(Request $request)
    {
        try {
            $crystalbars = $request->exchange_sum;
            if ($crystalbars < 100) {
                toastError('The minimum amount to exchange is 100 gold bars');
                return Redirect::back();
            } else {
                $checkuserbars = Auth::user()->withdraw;
                if ($checkuserbars < $crystalbars) {
                    toastError('You have not such bars to exchange');
                    return Redirect::back();
                } else {
                    $crystalpercent = $crystalbars / 100 * 20;
                    $silvercoins = $crystalbars + $crystalpercent;
                    Auth::user()->update([
                        'withdraw' => DB::raw('withdraw -' . $crystalbars),
                        'silver_coins' => DB::raw('silver_coins +' . $silvercoins),
                    ]);
                    toastSuccess('You have succesffully exchange bars to coins');
                    return Redirect::back();
                }
            }
        } catch (\Exception $exception) {
            toastError('Something went wrong, try again!');
            return Redirect::back();
        }
    }

    public function payment($id)
    {
        return view('Frontend.order_payoff', compact('id'));
    }
}
