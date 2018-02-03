<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 03/02/18
 * Time: 20:31
 */
?>

@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage system settings </div>

                    <div class="panel-body">

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#t1">Users</a></li>
                            <li><a data-toggle="tab" href="#t2">Task priorities</a></li>
                            <li><a data-toggle="tab" href="#t3">Task categories</a></li>
                            <li><a data-toggle="tab" href="#t4">Reminder types</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="t1" class="tab-pane fade in active">
                                <table class="table table-bordered table-condensed" id="users">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Dept</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t2" class="tab-pane fade">
                                <table class="table table-bordered table-condensed" id="task_priority">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t3" class="tab-pane fade">
                                <table class="table table-bordered table-condensed" id="task_category">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t4" class="tab-pane fade">
                                <table class="table table-bordered table-condensed" id="reminder_types">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

