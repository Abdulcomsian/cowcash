<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserCows;
use App\Models\Country;
use App\Models\UserReferal;
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

    public function showRegistrationForm()
    {
        Cookie::queue('referral', $_GET['ref']);
        $countries = Country::get();
        return view('auth.register', compact('countries'));
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        //event(new Registered($user = $this->create($request->all())));
        $user = $this->create($request->all());



        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
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
        $referal_link = env('APP_URL', 'accrualhub.com') . '/account/registration/?ref=' . $affiliateid;
        $referalcount = User::where(['referred_by' => $referred_by])->whereDate('created_at', Carbon::today())->count();
        if ($referalcount >= 20) {
            toastError('Your Day wise referals completed');
            return back();
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'silver_coins' => DB::raw('silver_coins +300'),
            'crystal'=>DB::raw('crystal + 0.1'),
            'role' => 'farmer',
            'affiliate_id' => $affiliateid,
            'referal_link' => $referal_link,
            'referred_by' => $referred_by,
            'country_id' => $data['country_id'],
            'currency' => $data['currency'],
            'visitorip' => $ipaddress,
        ]);
        if ($user) {
            UserReferal::create([
                'referred_by'=>$referred_by,
                'referal_coins'=> DB::raw('referal_coins +250')
            ]);
            //check parent
            if ($user->referred_by != NULL) {
                User::where('affiliate_id', $user->referred_by)->update(['silver_coins' => DB::raw('silver_coins +250'), 'referal_coins' => DB::raw('referal_coins +250')]);
            }
        if($user){
            $userCows = UserCows::create([
                'user_id' => $user['id'],
                'cow_id' => 1,
                'qty' => 1,
                'per_hours_litters' => 5,
            ]);
        }
            return $user;
        }
    }
}
