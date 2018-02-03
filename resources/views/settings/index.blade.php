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
                                <table class="table table-bordered table-striped table-hover" id="users" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Dept</th>
                                        <th>Created</th>
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


@section('js')
    <script>
        $(document).ready(function(){
            var table = $('#users').DataTable({
                responsive: true,
                "deferRender": true,
                "processing": true,
                "serverSide": true,
                "ordering": false, //disable column ordering
                "lengthMenu": [
                    [5, 10, 15, 20, 25, -1],
                    [5, 10, 15, 20, 25, "All"] // change per page values here
                ],
                "pageLength": 25,
                "ajax": {
                    url: '{!! route('manager.list.users') !!}',
                    method: 'POST'
                },
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'excel', title: 'list users',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'pdf', title: 'list users',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'print' }
                ],
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'roles[0].slug', name: 'roles[0].slug', orderable: false, "defaultContent": " - ", searchable: true},
                    {data: 'department.name', name: 'department.name', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

        });

    </script>
@endsection

