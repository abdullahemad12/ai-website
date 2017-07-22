@extends('layouts.default') @section('title') {{$course['title']}} @endsection @section('content')
<style>
    #title {
        font-size: 40px;
        font-weight: bold;
        border-bottom: solid 1px #307ff4;
        color: black;
    }
    
    #summary {
        padding-top: 2%;
        font-size: 16px;
        padding-left: 2%;
    }
    
    .row {
        margin-right: 2%;
    }
    
    #padding {
        padding-bottom: 20%;
    }

</style>
<div class="panel panel-info">
    <div class="panel-heading" id="title">
        {{$course['title']}}
    </div>
    <div class="panel-container" id="summary">
        {{$course['description']}}
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-xs-4" style="color:grey; font-size: 12px; font-weight: bold">
        Uploader: {{$course['name']}}
    </div>
    <?php
			$visibility = "hidden";
			if(Auth::check())
			{
				$visibility = "visible";
			}

		?>


        <div class="col-md-offset-6 col-md-1 col-xs-offset-6 col-xs-1" style="visibility:{{$visibility}} ">
            <a class="btn btn-danger" onclick="event.preventDefault();if (confirm('Are you sure you want to delete this?') == true) document.getElementById('delete-form').submit();">Delete</a>
        </div>
</div>
<form id="delete-form" action="{{'/courses/delete/' . $course['id']}}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<div id="padding">
    @endsection
