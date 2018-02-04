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
                <div class="panel-heading">Your 5 Latest tasks <a href='{{route('tasks.create.form')}}' class="pull-right btn btn-default" > New Task </a></div>
                <div class="panel-body">




                    <table class="table table-bordered table-hover table-striped" id="latest_tasks" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Due Date</th>
                                <th>Priority</th>
                                <th>Dept</th>
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

                    <table class="table table-bordered table-hover table-striped" id="latest_tasks" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Due Date</th>
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
