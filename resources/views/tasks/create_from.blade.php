<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 04/02/18
 * Time: 11:13
 */
?>

@extends('layouts.admin')

@section('content')

    <h3>Create a New </h3>

    <div class="container-fluid">

        {!! Form::open(['route'=>'tasks.create','class'=>'form' , 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Task Info</div>
                    <div class="panel-body">


                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control validate[required]">
                        </div>

                        <div class="form-group">
                            <label>Due Date</label>
                            <input name="due_date" class="form-control validate[required] datepicker" >
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control validate[required]"> </textarea>
                        </div>

                        <div class="form-group">
                            <label>Priority</label>
                            <select name="priority_id" id="" required class="form-control selectpicker validate[required]">
                                <option value=""> select one </option>
                                @foreach($task_priority as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="" required class="form-control selectpicker validate['required']">
                                <option value=""> select one </option>
                                @foreach($task_category as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" id="" required class="form-control selectpicker validate['required']" onchange='checkvalue(this.value)' >
                                <option value="public"> Public </option>
                                <option value="private"> Private </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Assign User</label>
                            <select name="assigned_user" id="" class="form-control selectpicker validate['required']" required>
                                <option value="{{auth()->user()->id}}"> my self </option>
                                @foreach($users as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">User Access</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label> User </label>
                            <select name="user_id[]" disabled="disabled" id="user_id" class="form-control selectpicker validate[required]" multiple>
                                <option value=""> select one </option>
                                @foreach($users as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <select name="dept_id[]" disabled="disabled" id="dept_id" class="form-control selectpicker validate['required']" multiple>
                                <option value=""> select one </option>
                                @foreach($user_dept as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Notify Users</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label> User </label>
                            <select name="notify_user_id[]" id="notify_user_id" class="form-control selectpicker" multiple>
                                <option value=""> select one </option>
                                @foreach($users as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <select name="notify_dept_id[]" id="notify_dept_id" class="form-control selectpicker" multiple>
                                <option value=""> select one </option>
                                @foreach($user_dept as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"> File Attachment </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label> File attachment </label>
                            <input type="file" name="myfiles[]" multiple >
                        </div>

                    </div>
                </div>




            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Save Changes </div>
                <div class="panel-body">
                    {!!Form::submit('Create Task',['class' => 'btn btn-default'] )!!}
                </div>
            </div>
            </div>
        </div>

        {!! Form::close() !!}


    </div>


@endsection


@section('js')

    <script>
        function checkvalue(val)
        {
            if(val==="private") {
                //document.getElementById("user_id").disabled = false;
                //document.getElementById("dept_id").disabled = false;
                $('#user_id').prop('disabled', false);
                $('#user_id').selectpicker('refresh');
                $('#dept_id').prop('disabled', false);
                $('#dept_id').selectpicker('refresh');
            } else {
                //document.getElementById("user_id").disabled = true;
                //document.getElementById("dept_id").disabled = true;
                $('#user_id').prop('disabled', true);
                $('#user_id').selectpicker('refresh');
                $('#dept_id').prop('disabled', true);
                $('#dept_id').selectpicker('refresh');
            }
        }
    </script>

@endsection
