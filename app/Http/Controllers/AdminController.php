<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cows;
use App\Models\UserCows;
use App\Models\Payment;
use App\Models\PayOff;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin dashbaord
    public function index()
    {
        try {
            $totalcows  = Cows::count();
            $totalusers = User::where('role', 'farmer')->count();
            $referalusers = User::where('referred_by', '!=', NULL)->count();
            return view('backend.Admin.dashboard', compact('totalcows', 'totalusers', 'referalusers'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //dashboard
    public function dashboard()
    {
        try {
            $totalcows  = Cows::count();
            $totalusers = User::where('role', 'farmer')->count();
            $referalusers = User::where('referred_by', '!=', NULL)->count();
            return view('backend.Admin.dashboard', compact('totalcows', 'totalusers', 'referalusers'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //all user
    public function AllUsers()
    {
        try {
            $users = User::with('totalaffiliate')->where('role', 'farmer')->paginate(100);
            return view('backend.Admin.User.index', compact('users'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //block user
    public function Block_user($id)
    {
        try {
            User::where('id', $id)->update(['status' => 0]);
            toastSuccess('User Block Successfully!');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //unblock user
    public function Unblock_user($id)
    {
        try {
            User::find($id)->update(['status' => 1]);
            toastSuccess('User is now Active');
            return back();
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //user orders and cows details
    public function User_cow_details($id)
    {
        try {
            $userOrders = UserCows::with('user', 'cow')->where('user_id', $id)->get();
            return view('backend.Admin.User.userorders', compact('userOrders'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //user referal details
    public function User_referal_details($id)
    {
        try {
            $user = User::find($id);
            $userreferal = User::where('referred_by', $user->affiliate_id)->get();
            return view('backend.Admin.User.userreferals', compact('userreferal', 'user'));
        } catch (\Exception $exception) {
            toastError('Something went wrong,try again');
            return back();
        }
    }
    //profile
    public function profile()
    {
        return view('backend.Admin.profile');
    }
    //paymetns
    public function admin_payments()
    {
        $payments=Payment::latest()->limit(100)->get();
         return view('backend.Admin.payments',compact('payments'));
    }

    //withdraw payments
    public function admin_withdraw_payments(Request $request)
    {
         $payments=PayOff::latest()->paginate(50);
         return view('backend.Admin.withdrawpaymetns',compact('payments'));
    }
}
