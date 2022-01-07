<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cows;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalcows = Cows::count();
        $totalusers = User::count();
        return view('backend.Admin.dashboard', compact('totalcows', 'totalusers'));
    }
    public function dashboard()
    {
        $totalcows = Cows::count();
        $totalusers = User::count();
        return view('backend.Admin.dashboard', compact('totalcows', 'totalusers'));
    }
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
}
