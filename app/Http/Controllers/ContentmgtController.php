<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

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

use \App\Models\Task;
use \App\Models\TaskUserAccess;
use \App\Models\TaskAttachment;
use \App\Models\TaskCategory;
use \App\Models\TaskPriority;
use \App\Models\TaskProgress;
use \App\Models\TaskReminder;


class ContentmgtController extends Controller
{
    use CustomResponses;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_task (Request $request) {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->except('_token'), [
                'name'    => 'required',
                'description' => 'required',
                'due_date' => 'required|date|after_or_equal:'.Carbon::today(),
                'priority_id' => 'required',
                'category_id' => 'required',
            ]);
            if ($validator->fails()) {
                //return redirect()->back()->withError('Enter valid username and/or password. Please check you input once again');
                $this->invalid_request('no','enter valid information','warning');
            } else {
                $task = new Task();
                $task->fill($request->except('_token','access_'));
                $saved = $task->save();
                if ($saved){
                    //assign users
                    self::create_user_access($request,$saved);
                    //notification group
                    self::create_user_notifications($request,$saved);
                    //done
                    $this->complete_request('no','Task created','success');
                }
                $this->invalid_request('no','Task not created','error');
            }
        }
        $this->invalid_request('no','invalid request','error');
    }

    public function create_user_access ($request,$task) {
        $new = new TaskUserAccess();

    }

    public function create_user_notifications ($request,$task) {

    }

    public function add_task_attachment (Request $request) {

    }
}
