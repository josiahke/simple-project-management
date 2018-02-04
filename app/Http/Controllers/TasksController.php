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

use \App\Models\Task;
use \App\Models\TaskUserAccess;
use \App\Models\TaskAttachment;
use \App\Models\TaskCategory;
use \App\Models\TaskPriority;
use \App\Models\TaskProgress;
use \App\Models\TaskReminder;
use App\Models\UserDepartment;
use App\User;

class TasksController extends Controller
{
    use CustomResponses;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_task_form (Request $request) {
        $user_dept = UserDepartment::get();
        $users = User::where('id','<>', auth()->user()->id)->get();

        $task_category = TaskCategory::get();
        $task_priority = TaskPriority::get();
        $task_reminder = TaskReminder::get();

        return view('tasks.create_from',compact('user_dept','users','task_category','task_priority','task_reminder'));
    }

    public function create_task (Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->except('_token'), [
                'name'    => 'required',
                'description' => 'required',
                'due_date' => 'required|date|after_or_equal:'.Carbon::today(),
                'priority_id' => 'required',
                'category_id' => 'required',
                'type' => 'required',
            ]);
            if ($validator->fails()) {
                //return redirect()->back()->withError('Enter valid username and/or password. Please check you input once again');
                return $this->invalid_request('no','enter valid information','warning');
            } else {
                $task = new Task();
                $task->fill($request->except('_token','user_id','dept_id'));
                $saved = $task->save();
                if ($saved){
                    //assign users
                    self::create_user_access($request,$task);
                    //notification group
                    self::create_user_notifications($request,$task);
                    //upload files
                    if($request->hasFile('myfiles')) {
                        self::uploadFiles($request,$task);
                    }
                    //done
                    return $this->complete_request('no','Task created','success');
                }
                return $this->invalid_request('no','Task not created','error');
            }
        }
        return $this->invalid_request('no','invalid request','error');
    }

    public function uploadFiles ($request,$task) {
        $files = $request->file('myfiles');
        foreach ($files as $file) {
            $filename = $file->store('uploads');
            TaskAttachment::create([
                'task_id' => $task->id,
                'name' => $filename,
                'file' => $filename
            ]);
        }
        return true;
    }

    public function create_user_access ($request,$task) {
        $users= $request->get('user_id');
        $dept= $request->get('dept_id');
        foreach ($users as $user ) {
            TaskUserAccess::create([
                'task_id' => $task->id,
                'user_id' => $user,
                'level_type' => 'user'
            ]);
        }
        foreach ($dept as $user ) {
            TaskUserAccess::create([
                'task_id' => $task->id,
                'user_id' => $user,
                'level_type' => 'department'
            ]);
        }
        return true;
    }

    public function create_user_notifications ($request,$task) {
        $users= $request->get('notify_user_id');
        $dept= $request->get('notify_dept_id');
        foreach ($users as $user ) {
            TaskUserAccess::create([
                'task_id' => $task->id,
                'user_id' => $user,
                'level_type' => 'user'
            ]);
        }
        foreach ($dept as $user ) {
            TaskUserAccess::create([
                'task_id' => $task->id,
                'user_id' => $user,
                'level_type' => 'department'
            ]);
        }
        return true;
    }

    public function add_task_attachment (Request $request) {

    }


    public function ListtasksLatest (Request $request) {
        return Datatables::of(Task::with('priority','category')
            ->where('status','<>', 'complete')
            ->where('assigned_user','=', auth()->user()->id)
            ->take(10)->orderBy('due_date')
        )
        ->make();
    }

    public function ListtasksNotice (Request $request) {
        return Datatables::of(Task::with('priority','category')->take(10)
            ->where('due_date', '<', Carbon::today()->addDays(7)->toDateString())
            ->where('status','<>', 'complete')
            ->where('assigned_user','=', auth()->user()->id)
            ->orderBy('due_date'))
            ->addColumn('notice', function ($list) {
                return "Task is due in ".Carbon::today()->diffForHumans(Carbon::parse($list->due_date)) . " ". date("d-M-Y", strtotime($list->due_date));
            })
        ->make();
    }

}
