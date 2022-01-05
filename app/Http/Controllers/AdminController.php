<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $totalcustomers = User::where('role', 'customer')->count();
        return view('backend.home.dashboard', compact('totalcustomers'));
    }
    public function dashboard()
    {
        $totalcustomers = User::where('role', 'customer')->count();
        return view('backend.home.dashboard', compact('totalcustomers'));
    }
}
