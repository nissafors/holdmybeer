<?php

// Copyright variables
$origin_year = 2014;
$date = getdate();
$this_year = $date['year'];
$copy = $origin_year.'-'.$this_year;
if ($this_year - $origin_year == 0) $copy = $origin_year;
$copyright_holders = 'Andreas Andersson';
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Hold My Beer - {{ $title }}</title>

    <!-- Bootstrap -->
    <link href="{{ URL::to('/') }}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="{{ URL::to('/') }}/css/hmb.css" rel="stylesheet">
    @if (isset($combobox) && $combobox === TRUE)
        <link href="{{ URL::to('/') }}/css/bootstrap-combobox.css" rel="stylesheet">
    @endif

                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}">Hold My Beer!</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if (null !== Auth::user())
                    <li class="dropdown disabled"><a href="#" class="dropdown-toggle"
                                                     data-toggle="dropdown">
                            <span class="glyphicon glyphicon-bell"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">No notifications</a></li>
                        </ul></li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">My recepies</a></li>
                            <li><a href="#">My logs</a></li>
                            <li><a href="#">My tasting notes</a></li>
                            <li class="divider"></li>
                            <li><a href="ingredientsmanager">Ingredients Manager</a></li>
                            <li><a href="#">Equipment Manager</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="{{ url('/logout') }}">Log out</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    @yield('page_header')
    @yield('content')
</div>

<div class="container-fluid">
    <hr>
    <div class="container">
        <p class="text-center">Copyright &copy; {{ $copy.' '.$copyright_holders }}<br>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ URL::to('/') }}/js/jquery-1.12.0.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
<script src="{{ URL::to('/') }}/js/hmb.js"></script>
@if (isset($combobox) && $combobox === TRUE)
        <!-- Combobox -->
<script src="{{ URL::to('/') }}/js/bootstrap-combobox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.combobox').combobox();
    });
</script>
@endif
</body>
</html>