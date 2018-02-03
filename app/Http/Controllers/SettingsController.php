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
use Datatables;

use \App\library\CustomResponses;

use \App\Models\UserDepartment;
use \App\Models\TaskPriority;
use \App\Models\TaskCategory;
use \App\Models\ReminderType;
use App\User;




class SettingsController extends Controller
{
    use CustomResponses;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_user_department(Request $request){
        $new = new UserDepartment();
        $new->fill($request->except('_token'));
        $saved = $new->save();
        if (!$saved){
            return $this->invalid_request('no','user department was not created','error');
        }
        else
        {
            return $this->complete_request('no','user department was created','success');
        }
    }

    public function edit_user_department(Request $request,$id){
        $edit = UserDepartment::where('id','=',$id)->first();
        if ($edit) {
            $saved = $edit->update($request->except('_token'));
            //$saved = $edit>save();
            if (!$saved){
                return $this->invalid_request('no','user department was not edited','error');
            }
            else
            {
                return $this->complete_request('no','user department was edited','success');
            }
        }
        else {
            return $this->invalid_request('no','user department was not edited, invalid id','error');
        }
    }

    public function create_task_priority (Request $request){
        $new = new TaskPriority();
        $new->fill($request->except('_token'));
        $saved = $new->save();
        if (!$saved){
            return $this->invalid_request('no','task priority was not created','error');
        }
        else
        {
            return $this->complete_request('no','task priority was created','success');
        }
    }

    public function edit_task_priority (Request $request,$id){
        $edit = TaskPriority::where('id','=',$id)->first();
        if ($edit) {
            $saved = $edit->update($request->except('_token'));
//            $saved = $edit>save();
            if (!$saved){
                return $this->invalid_request('no','task priority was not edited','error');
            }
            else
            {
                return $this->complete_request('no','task priority was edited','success');
            }
        }
        else {
            return $this->invalid_request('no','task priority was not edited, invalid id','error');
        }
    }

    public function create_task_category (Request $request){
        $new = new TaskCategory();
        $new->fill($request->except('_token'));
        $saved = $new->save();
        if (!$saved){
            return $this->invalid_request('no','task category was not created','error');
        }
        else
        {
            return $this->complete_request('no','task category was created','success');
        }
    }

    public function edit_task_category (Request $request,$id){
        $edit = TaskCategory::where('id','=',$id)->first();
        if ($edit) {
            $saved =  $edit->update($request->except('_token'));
            //$saved = $edit>save();
            if (!$saved){
                return  $this->invalid_request('no','task category was not edited','error');
            }
            else
            {
                return  $this->complete_request('no','task category was edited','success');
            }
        }
        else {
            return $this->invalid_request('no','task category was not edited, invalid id','error');
        }
    }

    public function create_reminder_type (Request $request){
        $new = new ReminderType();
        $new->fill($request->except('_token'));
        $saved = $new->save();
        if (!$saved){
            return $this->invalid_request('no','reminder type was not created','error');
        }
        else
        {
            return  $this->complete_request('no','reminder type was created','success');
        }
    }

    public function edit_reminder_type (Request $request,$id){
        $edit = ReminderType::where('id','=',$id)->first();
        if ($edit) {
            $saved = $edit->update($request->except('_token'));
//            $saved = $edit>save();
            if (!$saved){
                return   $this->invalid_request('no','reminder type was not edited','error');
            }
            else
            {
                return  $this->complete_request('no','reminder type was edited','success');
            }
        }
        else {
            return  $this->invalid_request('no','reminder type was not edited, invalid id','error');
        }
    }

    public function create_user (Request $request){
        $new = new User();
        $data = $request->except('_token');
        $data['password'] = Hash::make($request->get('password'));
        $new->fill($data);
        $saved = $new->save();
        if (!$saved){
            return  $this->invalid_request('no','user was not created','error');
        }
        else
        {
            return  $this->complete_request('no','user was created','success');
        }
    }

    public function edit_user_password (Request $request, $id){
        $edit = User::where('id','=',$id)->first();
        if ($edit) {
            //$edit->fill($request->except('_token'));
            $edit->password = Hash::make($request->get('pwd'));
            $saved = $edit>save();
            if (!$saved){
                return  $this->invalid_request('no','user was not edited','error');
            }
            else
            {
                return  $this->complete_request('no','user was edited','success');
            }
        }
        else {
            return $this->invalid_request('no','user was not edited, invalid id','error');
        }
    }

    public function edit_user_profile (Request $request, $id){
        $edit = User::where('id','=',$id)->first();
        if ($edit) {
            $data = $request->except('_token');
            //if ($request->get('password')){
                //$data['password'] = Hash::make($request->get('password'));
            //}
            $saved = $edit->update($data);
            //$saved = $edit->save();
            //$edit->fill($request->except('_token'));
            //$saved = $edit>save();
            if (!$saved){
                return  $this->invalid_request('no','user was not edited','error');
            }
            else
            {
                return   $this->complete_request('no','user was edited','success');
            }
        }
        else {
            return $this->invalid_request('no','user was not edited, invalid id','error');
        }
    }

}
