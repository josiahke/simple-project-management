<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use Auth;
use Validator;
use Hash;
use Mail;

use Config;
use Session;
use Input;
use View;
use DB;
use Log;
//use Datatables;

use Yajra\DataTables\DataTables;

use \App\library\CustomResponses;

use \App\Models\UserDepartment;
use \App\Models\TaskPriority;
use \App\Models\TaskCategory;
use \App\Models\ReminderType;
use \App\User;


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

    public function listUsers (Request $request) {
        return Datatables::of(User::with('roles','department'))
        ->addColumn('tools', function ($list)  {
                return "
        <div class='btn-group pull-right'>
        <button type='button' class='btn green btn-sm btn-outline dropdown-toggle' data-toggle='dropdown'
        aria-expanded='true'> Actions
        </button>
        <ul class='dropdown-menu pull-right' role='menu'>
			
        </ul>
        </div>";
            })
        ->rawColumns(['tools'])
        ->make();
    }

}
