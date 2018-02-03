<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        if (Auth::check()) {
//            if (auth()->user()->isRole('superadmin')) {
//                return redirect()->route('admin.home');
//            }
            if (auth()->user()->isRole('manager')) {
                return redirect()->route('manager.home');
            }
            if (auth()->user()->isRole('member')) {
                return redirect()->route('staff.home');
            }
            auth()->logout();
            return redirect()->back()->withError('Login was successful but, You have an invalid user permissions');
        } else {
            Auth::logout();
            return redirect()->back()->withError('Invalid User credentials or Account has been disabled . Please try again');
        }
    }
}
