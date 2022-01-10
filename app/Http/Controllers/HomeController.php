<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCows;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('Frontend.home');
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
