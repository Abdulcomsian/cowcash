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



    //cron job for calculating per hour milk cow and user should be active
    public function calculate_milk_per_hour()
    {
        UserCows::with('user')->where('status', 1)->chunk(100, function ($users) {
            foreach ($users as $user) {
                if ($user->user->status == 1) {
                    DB::table('user_cows')
                        ->where('id', $user->id)
                        ->update([
                            'total_milk' => DB::raw('total_milk +' . $user->per_hours_litters . ''),
                        ]);
                }
            }
        });
    }
}
