<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        return view('admin.index');
    }

    public function settings(Request $request){
        return view('settings.index');
    }

}
