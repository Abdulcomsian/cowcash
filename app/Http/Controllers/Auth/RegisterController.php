<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cookie;
use DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest', 'refeeral']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referred_by = '';
        if (!empty(Cookie::get('referral'))) {
            $referred_by = Cookie::get('referral');
        }

        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://127.0.0.1:8000') . '/register/?ref=' . $affiliateid;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'farmer',
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'referred_by' => $referred_by,
        ]);
        if ($user) {
            //check parent
            if ($referred_by != '') {
                //parent have got 30 coins
                User::where('affiliate_id', $referred_by)->update(['silver_coins' => DB::raw('silver_coins +30'), 'referal_coins' => DB::raw('referal_coins +30')]);
                $userlevel1parent = User::where(['affiliate_id' => $referred_by])->first();
                if ($userlevel1parent->referred_by != NULL) {

                    $userlevel2parent = User::where(['affiliate_id' => $userlevel1parent->referred_by])->first();
                    if ($userlevel2parent->referred_by != NULL) {
                        User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins +20'), 'referal_coins' => DB::raw('referal_coins +20')]);
                        $userlevel3parent = User::where(['affiliate_id' => $userlevel2parent->referred_by])->first();
                        if ($userlevel3parent) {
                            User::where('id', $userlevel3parent->id)->update(['silver_coins' => DB::raw('silver_coins +10'), 'referal_coins' => DB::raw('referal_coins +10')]);
                        }
                    } else {
                        User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins +20'), 'referal_coins' => DB::raw('referal_coins +20')]);
                    }
                }
            }
            return $user;
        }
    }
}
