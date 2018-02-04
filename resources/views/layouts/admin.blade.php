<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simple Task Management') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('js/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('js/validation/validationEngine.jquery.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('css/style5.css') }}" rel="stylesheet">

    <style>
        .container-fluid {
            padding-right: 0px;
            padding-left: 0px;
        }
        .tab-content > .tab-pane {
            padding-top: 10px;
        }
    </style>

    @yield('css')

</head>
<body>


<div class="wrapper">
    <!-- Sidebar Holder -->

    @include('includes.menu')


    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default menu">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }}
                                {{--<span class="caret"></span>--}}
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

       </div>
</div>





<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script type="text/javascript" src="{{asset('js/validation/jquery.validationEngine-en.js')}}"></script>
<script type="text/javascript" src="{{asset('js/validation/jquery.validationEngine.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

<script>
    $(document).ready(function(){
        jQuery("form").validationEngine('attach', { prettySelect: true, usePrefix: 's2id_',useSuffix: "select2-offscreen", autoPositionUpdate: true });
        var curpage = '{{Request::url()}}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>

<script>
    var curpage = '{{Request::url()}}';
    $( "#sidebar li" ).each( function( index, element ){
        var url = $( this ).find( "a" ).attr('href');
        if (curpage == url ) 	{
            $(this).addClass('active');
        }
    });
</script>

<script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '0d'
    });
</script>

@yield('js')

@include('includes.messages')

@yield('modals')

</body>
</html>
