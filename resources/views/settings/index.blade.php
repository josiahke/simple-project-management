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
                            <li><a data-toggle="tab" href="#t5">User Department</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="t1" class="tab-pane fade in active">

                                <table class="table table-bordered table-striped table-hover" id="users" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Dept</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t2" class="tab-pane fade">
                                <a href='#' class="pull-right btn btn-default" data-url='{{route('settings.add.task.priority')}}' data-toggle="modal" data-target="#editTaskPriority" > Add New </a>

                                <table class="table table-bordered table-striped table-hover" id="task_priority" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t3" class="tab-pane fade">
                                <a href='#' class="pull-right btn btn-default" data-url='{{route('settings.add.task.category')}}' data-toggle="modal" data-target="#editTaskCategory" > Add New </a>

                                <table class="table table-bordered table-striped table-hover" id="task_category" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t4" class="tab-pane fade">

                                <a href='#' class="pull-right btn btn-default" data-url='{{route('settings.add.reminder.type')}}' data-toggle="modal" data-target="#editReminderType" > Add New </a>


                                <table class="table table-bordered table-striped table-hover" id="reminder_types" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="t5" class="tab-pane fade">

                                <a href='#' class="pull-right btn btn-default" data-url='{{route('settings.add.user.department')}}' data-toggle="modal" data-target="#editUserDept" > Add New </a>

                                <table class="table table-bordered table-striped table-hover" id="user_department" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created</th>
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
                    {data: 'status', name: 'status', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

            var table2 = $('#task_priority').DataTable({
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
                    url: '{!! route('manager.list.task.priority') !!}',
                    method: 'POST'
                },
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'excel', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'pdf', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'print' }
                ],
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

            var table3 = $('#task_category').DataTable({
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
                    url: '{!! route('manager.list.task.category') !!}',
                    method: 'POST'
                },
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'excel', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'pdf', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'print' }
                ],
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

            var table4 = $('#reminder_types').DataTable({
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
                    url: '{!! route('manager.list.task.reminder.types') !!}',
                    method: 'POST'
                },
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'excel', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'pdf', title: 'list task priority',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'print' }
                ],
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

            var table5 = $('#user_department').DataTable({
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
                    url: '{!! route('manager.list.user.departments') !!}',
                    method: 'POST'
                },
                "dom": "<'row' <'col-md-12'>><'row'<'col-md-8 col-sm-12'lB><'col-md-4 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
                buttons: [
                    { extend: 'copy',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'csv',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'excel', title: 'list user departments',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'pdf', title: 'list user departments',exportOptions: {columns: [0, 1, 2, 3,4,5]}},
                    {extend: 'print' }
                ],
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'created_at', name: 'created_at', orderable: false, searchable: true},
                    {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],
            });

        });
    </script>
@endsection


@section('modals')

    <div class="modal fade" id="editUserDept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 id="edit-header-txt" class="text-center"> User Department </h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="editUserDeptForm" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="form-group">
                                <label> Name : </label>
                                <div >
                                    <input type="text" value="" class="form-control validate[required]" name="name" id="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div >
                                    <button type="submit" name="Update" value="Update" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script>
        $('#editUserDept').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#editUserDeptForm').attr('action', button.data('url'));
            $('#name').val(button.data('name'));
        })
    </script>

    <div class="modal fade" id="editReminderType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 id="edit-header-txt" class="text-center"> Reminder Type </h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="editReminderTypeForm" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="form-group">
                                <label> Name : </label>
                                <div >
                                    <input type="text" value="" class="form-control validate[required]" name="name" id="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div >
                                    <button type="submit" name="Update" value="Update" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script>
        $('#editReminderType').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#editReminderTypeForm').attr('action', button.data('url'));
            $('#editReminderTypeForm #name').val(button.data('name'));
        })
    </script>


    <div class="modal fade" id="editTaskCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 id="edit-header-txt" class="text-center"> Task Category </h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="editTaskCategoryForm" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="form-group">
                                <label> Name : </label>
                                <div >
                                    <input type="text" value="" class="form-control validate[required]" name="name" id="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div >
                                    <button type="submit" name="Update" value="Update" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script>
        $('#editTaskCategory').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#editTaskCategoryForm').attr('action', button.data('url'));
            $('#editTaskCategoryForm #name').val(button.data('name'));
        })
    </script>

    <div class="modal fade" id="editTaskPriority" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 id="edit-header-txt" class="text-center"> Task Priority </h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="editTaskPriorityForm" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="form-group">
                                <label> Name : </label>
                                <div >
                                    <input type="text" value="" class="form-control validate[required]" name="name" id="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div >
                                    <button type="submit" name="Update" value="Update" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script>
        $('#editTaskPriority').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#editTaskPriorityForm').attr('action', button.data('url'));
            $('#editTaskPriorityForm #name').val(button.data('name'));
        })
    </script>


    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 id="edit-header-txt" class="text-center"> User Profile </h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post" id="editProfileForm" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <div class="form-body">

                            <div class="form-group">
                                <label> Name : </label>
                                <div >
                                    <input type="text" value="" class="form-control validate[required]" name="name" id="name" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label> Department : </label>
                                <div >
                                    {{--<input type="text" value="" name="name" id="name" placeholder="">--}}
                                    <select name="dept_id" class="form-control validate[required]" id="dept_id" >
                                            <option value=""> select one </option>
                                            @foreach ($user_dept as $list)
                                                <option value="{{$list->id}}"> {{$list->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div >
                                    <button type="submit" name="Update" value="Update" class="btn btn-success">
                                        <i class="fa fa-check"></i> Save </button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

    <script>
        $('#editProfile').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#editProfileForm').attr('action', button.data('url'));
            $('#editProfileForm #name').val(button.data('name'));
            $('#editProfileForm #dept_id').val(button.data('dept_id'));
            // $('#editProfileForm #dept_id').val(button.data('role_id'));
        })
    </script>

@endsection
