<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCows;
use App\Models\User;
use App\Models\Cows;
use DB;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    //front end page page hoeme page
    public function index()
    {
        try {
        
            $allusers = User::where('role', 'farmer')->count();
            $newuser = User::where('role', 'farmer')->where('created_at', '>', Carbon::now()->subDays(1))->count();
            $todayActive = User::where('role', 'farmer')->whereDate('created_at', Carbon::today())->count();
            return view('Frontend.home', compact('allusers', 'newuser', 'todayActive'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    

    public function servey(Request $request)
    {
        User::find(Auth::user()->id)->update(['is_servey'=>1]);
        return redirect('/home');
    }


    //cron job for calculating per hour milk cow and user should be active
    public function calculate_milk_per_hour()
    {
        UserCows::with('user')->where('status', 1)->chunk(100, function ($users) {
            foreach ($users as $user) {
                if ($user->user->status == 1) {
                    $total_milk = $user->per_hours_litters * $user->qty;
                    DB::table('user_cows')
                        ->where('id', $user->id)
                        ->update([
                            'cronjobtime' => date('Y-m-d H:i:s'),
                            'collect_per_hour_milk' => DB::raw('collect_per_hour_milk +' .  $total_milk . ''),
                        ]);
                }
            }
        });
    }
}
