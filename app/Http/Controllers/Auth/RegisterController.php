<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Country;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cookie;
use DB;
use Carbon\Carbon;
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
            'country_id' => ['required'],
            'currency' => ['required'],
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        $response = new Illuminate\Http\Response('Hello World');
        $response->withCookie(cookie()->forever('referral', $_GET['ref']));
        $countries = Country::get();
        return view('auth.register', compact('countries'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referred_by = NULL;
        if (!empty(Cookie::get('referral'))) {
            $referred_by = Cookie::get('referral');
        }
            
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $affiliateid = Str::random(10);
        $referal_link = env('APP_URL', 'http://accrualhub.com/') . '/register/?ref=' . $affiliateid;
        $referalcount=User::where(['referred_by'=>$referred_by])->whereDate('created_at', Carbon::today())->count();
        if($referalcount>=20)
        {
            toastError('Your Day wise referals completed');
            return back();
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'silver_coins'=>DB::raw('silver_coins +320'),
            'role' => 'farmer',
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'referred_by' => $referred_by,
            'country_id' => $data['country_id'],
            'currency' => $data['currency'],
            'visitorip'=>$ipaddress,
        ]);
        if ($user) {
            //check parent
            if ($user->referred_by != NULL) {
                //parent have got 30 coins
                User::where('affiliate_id', $user->referred_by)->update(['silver_coins' => DB::raw('silver_coins +250'), 'referal_coins' => DB::raw('referal_coins +250')]);
                // $userlevel1parent = User::where(['affiliate_id' => $referred_by])->first();
                // if ($userlevel1parent->referred_by != NULL) {

                //     $userlevel2parent = User::where(['affiliate_id' => $userlevel1parent->referred_by])->first();
                //     if ($userlevel2parent->referred_by != NULL) {
                //         User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins +20'), 'referal_coins' => DB::raw('referal_coins +20')]);
                //         $userlevel3parent = User::where(['affiliate_id' => $userlevel2parent->referred_by])->first();
                //         if ($userlevel3parent) {
                //             User::where('id', $userlevel3parent->id)->update(['silver_coins' => DB::raw('silver_coins +10'), 'referal_coins' => DB::raw('referal_coins +10')]);
                //         }
                //     } else {
                //         User::where('id', $userlevel2parent->id)->update(['silver_coins' => DB::raw('silver_coins +20'), 'referal_coins' => DB::raw('referal_coins +20')]);
                //     }
                // }
            }
            return $user;
        }
    }
}
