<!--Default header for the webiste Note: the footer must be added to page-->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Machine Learning-@yield('title')</title>
    <!--Css and javascript includes-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/default.css" rel="stylesheet"> @yield('style')

    <script src="/js/framework/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="/js/framework/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="/img/art/logo.png"></a>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/projects">Projects</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About Us</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span><span id = "account">Account</span>
				        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                        <li id="bord"><a href="/profile"><b><span class="glyphicon glyphicon-user"></span> Profile</b></a></li>
                        @if(Auth::user()["admin"])
                        <li id="bord"><a href="#"><b><span class="glyphicon glyphicon-file"></span> Add Course</b></a></li>
                        @endif
                        <li id="bord"><a href="#"><b><span class="glyphicon glyphicon-file"></span> Add Event</b></a></li>

                        <li id="bord"><a href="/projects/add"><b><span class="glyphicon glyphicon-file"></span> Add Project</b></a></li>
                        @if(Auth::user()["admin"])
                        <li id="bord"><a href="#"><b><span class="glyphicon glyphicon-edit"></span> Manage members</b></a></li>
                        @endif
                        <li id="bord"><a href="/activities"><b><span class="glyphicon glyphicon-th-list"></span> Activity Log</b></a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b><span class="glyphicon glyphicon-log-out"></span>Logout</b></a></li>
                        @else
                        <li><a href="/login"><b><span class="glyphicon glyphicon-log-in"></span> Log in</b></a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="body">
            @yield('content')
        </div>
        <footer class="footer">
            <p>All rights reserved © Machine Learning departement(GUC)</p>
            <img src="/img/footer/FB-f-Logo__blue_50.png">
            <img src="/img/footer/GitHub-Mark-64px.png">
            <img src="/img/footer/glyph-logo_May2016.png">
            <img src="/img/footer/Twitter_Logo_Blue.png">
            <img src="/img/footer/YouTube-icon-full_color.png">

        </footer>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</body>

</html>
