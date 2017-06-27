@extends('layouts.default')

@section('title')
	{{$project['title']}}
@endsection

@section('content')
<style>
	#title
	{
		font-size: 40px;
		font-weight: bold;
		border-bottom: solid 1px #307ff4;
		color:black;
	}
	#summary
	{
		padding-top: 2%;
		font-size:16px;
		padding-left:2%;
	}
	.row
	{
		margin-right:2%;
	}
</style>
<div class = "panel panel-info">
	<div class = "panel-heading" id = "title">
		{{$project['title']}}
	</div>
	<div class = "panel-container" id = "summary">
		{{$project['description']}}
	</div>
</div>

@if($project['url'] != 'none')
	
	<div class = "row">
	<div class = "col-md-4 col-xs-4" style="color:grey; font-size: 12px; font-weight: bold">
		Uploader: {{$project['name']}}
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
		<div class = "col-md-1 col-xs-1">
			<a href="/{{$project['url']}}" class="btn btn-primary">Download</a>
		</div>
	</div>
@endif

	<form id="delete-form" action="{{'/projects/delete/' . $project['id']}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
        </form>

@endsection