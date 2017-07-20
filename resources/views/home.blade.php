@extends('layouts.default') @section('style')
<link href="/css/home.css" rel="stylesheet"> @endsection @section('content')
<div class="">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3d/Code-1076536.jpg" class="img">
            </div>


            <div class="item">
                <img src="https://pixnio.com/free-images/2017/03/23/2017-03-23-13-49-09.jpg" class="img">
            </div>

            <div class="item">
                <img src="https://cdn.pixabay.com/photo/2015/05/26/23/52/technology-785742_960_720.jpg" class="img">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

@endsection
