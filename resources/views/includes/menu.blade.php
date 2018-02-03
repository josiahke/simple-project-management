<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 03/02/18
 * Time: 21:12
 */
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Project Mgt</h3>
        <strong>PM</strong>
    </div>

@role('manager')

    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{route('manager.home')}}">
                <i class="glyphicon glyphicon-home"></i>
                Home
            </a>
        </li>

        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="glyphicon glyphicon-paperclip"></i> Tasks and followups </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li><a href="#"> My Tasks</a></li>
                <li><a href="#"> Department Tasks</a></li>
                <li><a href="#"> Other Tasks</a></li>
            </ul>
        </li>

        <li>
            <a href="#">
                <i class="glyphicon glyphicon-book"></i>
                Reports
            </a>
        </li>

        <li>
            <a href="{{route('manager.settings')}}">
                <i class="glyphicon glyphicon-cog"></i>
                Settings
            </a>
        </li>
    </ul>

@else

        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{route('staff.home')}}" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="{{route('staff.tasks')}}">
                    <i class="glyphicon glyphicon-paperclip"></i>
                    My Tasks
                </a>
            </li>
        </ul>


@endrole

        <ul class="list-unstyled CTAs">
            {{--<li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>--}}
            {{--<li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>--}}
            <li>
                <a href="{{ route('logout') }}" class="download"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
</nav>
