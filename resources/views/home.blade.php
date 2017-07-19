@extends('layouts.default')

@section('content')

<style>
   .carousel{
        width: 100vw;
    }
.img{
    width:100%;
    object-fit: cover;
    min-height: 60vh;
    max-height: 60vh;
}
</style>
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
        <img src="https://tctechcrunch2011.files.wordpress.com/2015/02/shutterstock_175625024.jpg"  class="img">
      </div>

      <div class="item">
        <img src="http://tomtunguz.com/images/ml_icons.jpg"   class="img">
      </div>
    
      <div class="item">
        <img src="http://hexaring.com/wp-content/uploads/2017/04/m-learning.jpg" class="img">
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
