<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 04/02/18
 * Time: 11:02
 */
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Your 10 Latest tasks <a href='{{route('tasks.create.form')}}' class="pull-right btn btn-default" > New Task </a></div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover table-striped" id="latest_tasks" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Category</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Your Notifications</div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover table-striped" id="notice_tasks" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Notice</th>
                            <th>Priority</th>
                            <th>Status</th>
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

@section('js')
    <script>

        $(document).ready(function(){


            var table = $('#latest_tasks').DataTable({
                responsive: true,
                "deferRender": true,
                "processing": true,
                "serverSide": true,
                "ordering": false, //disable column ordering
                "lengthMenu": [
                    [5, 10, 15, 20, 25, -1],
                    [5, 10, 15, 20, 25, "All"] // change per page values here
                ],
                "pageLength": 10,
                "ajax": {
                    url: '{!! route('tasks.list.mine.latest') !!}',
                    method: 'POST'
                },
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'due_date', name: 'due_date', orderable: false, "defaultContent": " - ", searchable: true},
                    {data: 'priority.name', name: 'priority.name', orderable: false, searchable: true},
                    {data: 'category.name', name: 'category.name', orderable: false, searchable: true},
                    {data: 'status', name: 'status', orderable: false, searchable: true},
                ],

            });

            var table = $('#notice_tasks').DataTable({
                responsive: true,
                "deferRender": true,
                "processing": true,
                "serverSide": true,
                "ordering": false, //disable column ordering
                "lengthMenu": [
                    [5, 10, 15, 20, 25, -1],
                    [5, 10, 15, 20, 25, "All"] // change per page values here
                ],
                "pageLength": 10,
                "ajax": {
                    url: '{!! route('tasks.list.notices') !!}',
                    method: 'POST'
                },
                columns: [
                    {data: 'name', name: 'name', orderable: false, searchable: true},
                    {data: 'notice', name: 'notice', orderable: false, "defaultContent": " - ", searchable: false},
                    {data: 'priority.name', name: 'priority.name', orderable: false, searchable: true},
                    // {data: 'category.name', name: 'category.name', orderable: false, searchable: true},
                    {data: 'status', name: 'status', orderable: false, searchable: true},
                    // {data: 'tools', name: 'tools', orderable: false, searchable: false,"defaultContent": "<i>Not set</i>"},
                ],

            });

        });

    </script>

@endsection
