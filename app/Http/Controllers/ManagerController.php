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
			<li><a href='#' data-url='" . route('settings.edit.user.password',$list->id) . "' data-toggle=\"modal\" data-target=\"#editPwd\" > Edit password </a></li>
			<li><a href='#' data-url='" . route('settings.edit.user.profile',$list->id) . "' data-name='".$list->name."' data-dept='".$list->dept_id."' data-toggle=\"modal\" data-target=\"#editProfile\" > Edit profile </a></li>                 
        </ul>
        </div>";
            })
        ->rawColumns(['tools'])
        ->make();
    }

    public function listTaskPriority (Request $request) {
        return Datatables::of(TaskPriority::query())
        ->addColumn('tools', function ($list)  {
                return "
        <div class='btn-group pull-right'>
        <button type='button' class='btn green btn-sm btn-outline dropdown-toggle' data-toggle='dropdown'
        aria-expanded='true'> Actions
        </button>
        <ul class='dropdown-menu pull-right' role='menu'>
			<li><a href='#' data-url='" . route('settings.edit.task.priority',$list->id) . "' data-name='".$list->name."' data-toggle=\"modal\" data-target=\"#editTaskPriority\" > Edit </a></li>                 
        </ul>
        </div>";
        })
        ->rawColumns(['tools'])
        ->make();
    }

    public function listTaskCategory (Request $request) {
        return Datatables::of(TaskCategory::query())
        ->addColumn('tools', function ($list)  {
                return "
        <div class='btn-group pull-right'>
        <button type='button' class='btn green btn-sm btn-outline dropdown-toggle' data-toggle='dropdown'
        aria-expanded='true'> Actions
        </button>
        <ul class='dropdown-menu pull-right' role='menu'>
			<li><a href='#' data-url='" . route('settings.edit.task.category',$list->id) . "' data-name='".$list->name."' data-toggle=\"modal\" data-target=\"#editTaskCategory\" > Edit </a></li>                 
        </ul>
        </div>";
        })
        ->rawColumns(['tools'])
        ->make();
    }

    public function listReminderTypes (Request $request) {
        return Datatables::of(ReminderType::query())
        ->addColumn('tools', function ($list)  {
                return "
        <div class='btn-group pull-right'>
        <button type='button' class='btn green btn-sm btn-outline dropdown-toggle' data-toggle='dropdown'
        aria-expanded='true'> Actions
        </button>
        <ul class='dropdown-menu pull-right' role='menu'>
			<li><a href='#' data-url='" . route('settings.edit.reminder.type',$list->id) . "' data-name='".$list->name."' data-toggle=\"modal\" data-target=\"#editReminderType\" > Edit </a></li>                 
        </ul>
        </div>";
        })
        ->rawColumns(['tools'])
        ->make();
    }

    public function listUserDepartments (Request $request) {
        return Datatables::of(UserDepartment::query())
        ->addColumn('tools', function ($list)  {
                return "
        <div class='btn-group pull-right'>
        <button type='button' class='btn green btn-sm btn-outline dropdown-toggle' data-toggle='dropdown'
        aria-expanded='true'> Actions
        </button>
        <ul class='dropdown-menu pull-right' role='menu'>
			<li><a href='#' data-url='" . route('settings.edit.user.department',$list->id) . "' data-name='".$list->name."' data-toggle=\"modal\" data-target=\"#editUserDept\" > Edit </a></li>                 
        </ul>
        </div>";
        })
        ->rawColumns(['tools'])
        ->make();
    }

}
