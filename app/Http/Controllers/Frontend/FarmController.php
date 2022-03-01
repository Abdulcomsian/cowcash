<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cows;
use App\Models\UserCows;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Auth;
use DB;

class FarmController extends Controller
{
    public function index()
    {
        try {
            $cows = Cows::get();
            $perchasecows = UserOrder::where(['user_id' => Auth::user()->id])->count();
            return view('Frontend.buycows', compact('cows', 'perchasecows'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }

    //Milk wearhouse
    public function milk_wearhouse()
    {
        try {
            $per_hour_collection = UserCows::join('cows', 'cows.id', '=', 'user_cows.cow_id')
                ->select('cows.*', DB::raw('sum(user_cows.qty) as bought'), DB::raw('sum(user_cows.collect_per_hour_milk) as laidmilk'))
                ->groupBy('user_cows.cow_id')
                ->get();
            $total_laid_milk = UserCows::where('user_id', Auth::user()->id)->sum('collect_per_hour_milk');
            return view('Frontend.milk-wearhouse', compact('per_hour_collection', 'total_laid_milk'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //collect milk from wearhouse
    public function collect_milk(Request $request)
    {
        try {
            foreach ($request->item as $cow) {
                UserCows::where(['cow_id' => $cow])->update([
                    'total_milk' => DB::raw('total_milk + collect_per_hour_milk'),
                    'collect_per_hour_milk' => 0,
                ]);
            }
            toastSuccess('You have successfully collected Milk');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //total milk for sale 
    public function Sell_milk()
    {
        $milkforsell = UserCows::with('cow')->where('user_id', Auth::user()->id)->get();
        $totalmilkforsale = UserCows::where('user_id', Auth::user()->id)->sum('total_milk');
        return view('Frontend.sellmilk', compact('milkforsell', 'totalmilkforsale'));
    }
    //calcualte income
    public function calculate()
    {
        $cows = Cows::get();
        return view('Frontend.calculate', compact('cows'));
    }

    //account coins
    public function coins()
    {
        return view('Frontend.crystal');
    }
}
