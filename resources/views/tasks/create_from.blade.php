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

    <div class="container-fluid">

        {!! Form::open(['route'=>'tasks.create','class'=>'form']) !!}

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
                            <select name="priority_id" id="" class="form-control validate[required]">
                                <option value=""> select one </option>
                                @foreach($task_priority as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="priority_id" id="" class="form-control validate['required']">
                                <option value=""> select one </option>
                                @foreach($task_category as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" id="" class="form-control validate['required']" onchange='checkvalue(this.value)' >
                                <option value="public"> Public </option>
                                <option value="private"> Private </option>
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
                            <label> User Access </label>
                            <select name="user_id[]" disabled="disabled" id="user_id" class="form-control validate[required]" multiple>
                                <option value=""> select one </option>
                                @foreach($users as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <select name="dept_id[]" disabled="disabled" id="dept_id" class="form-control validate['required']" multiple>
                                <option value=""> select one </option>
                                @foreach($user_dept as $list)
                                    <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>

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
                document.getElementById('user_id').removeAttribute('disabled'); //.style.display='block';
                document.getElementById('dept_id').removeAttribute('disabled'); //style.display='block';
            } else {
                document.getElementById('user_id').setAttribute('disabled') //.Attributes('disabled');
                document.getElementById('dept_id').setAttribute('disabled') //.Attributes('disabled');
            }
        }
    </script>

@endsection
