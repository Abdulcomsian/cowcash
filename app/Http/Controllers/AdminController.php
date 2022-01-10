<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cows;
use App\Models\UserCows;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //admin dashbaord
    public function index()
    {
        $totalcows = Cows::count();
        $totalusers = User::count();
        return view('backend.Admin.dashboard', compact('totalcows', 'totalusers'));
    }
    //dashboard
    public function dashboard()
    {
        $totalcows = Cows::count();
        $totalusers = User::count();
        return view('backend.Admin.dashboard', compact('totalcows', 'totalusers'));
    }
    //all user
    public function AllUsers()
    {
        try {
            $users = User::where('role', 'farmer')->get();
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
    //profile
    public function profile()
    {
        return view('backend.Admin.profile');
    }
}
