@extends('layouts.default')

@section('title')
Latest Activites
@endsection

@section('content')
<style>
	#table
	{
		background-color: #fffcff;
		margin-right:20%;
		margin-left: 20%;
	}
	#table #header
	{
		border-bottom: solid 1px #ddd9dd;
		font-size: 20px;
		font-weight: bold;
	}
	#item
	{
		padding-top: 20px;
		font-size: 14px;
	}
</style>
 <div class="panel panel-primary">
 	<div class="panel-heading">
		<div id = "header" class = "row">
			<div class = "col-md-9 col-xs-7">Activity</div>
			<div class = "col-md-3 col-xs-5">Time</div>
		</div>
	</div>
	<div class="panel-body">
	@for($i = 0 ,$n = sizeof($activities); $i < $n; $i++)
		<div id = "item" class = "row">
			@if($activities[$i]['activity'] == "delete")

				<div class = "col-md-9 col-xs-7"><span class="glyphicon glyphicon-remove"></span> {{$usernames[$i]["name"]}} Deleted {{$activities[$i]['title']}}</div>
			
			@elseif($activities[$i]['activity'] == "create")
				<div class = "col-md-9 col-xs-7"><span class="glyphicon glyphicon-file"></span> {{$usernames[$i]["name"]}} Created {{$activities[$i]['title']}}</div>
			@else
				<div class = "col-md-9 col-xs-7"><span class="glyphicon glyphicon-edit"></span> {{$usernames[$i]["name"]}} Updated {{$activities[$i]['title']}}</div>
			@endif
			<div class = "col-md-3 col-xs-5">{{$activities[$i]['created_at']}}</div>
		</div>
	@endfor
	</div>
</div>
@endsection



