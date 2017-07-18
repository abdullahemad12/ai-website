@extends('/layouts/default')

@section('style')
	<link href = "/css/profile.css" rel = "stylesheet">
@endsection


@section('content')
	<div class = "row">
		<div class = "col-md-2">
			<img src = "/img/art/if_Sed-09_2232326.png">
		</div>
		<div class = "col-md-7">
			<div class = "row" id = "name">
				{{$user['name']}}
			</div>
			<div class = "row" id = "email">
				<span class="glyphicon glyphicon-envelope"></span> {{$user['email']}}
			</div>
			<div class = "row" id = "email">
				<span class="glyphicon glyphicon-earphone"></span> 0{{$user['number']}}
			</div>
			<div class = "row" id = "created_at">
				<span class="glyphicon glyphicon-calendar"></span> Joined on: {{$user['created_at']}}
			</div>
			<div class = "row" id = "summary">
				Summary: 
				<p>{{$user['summary']}}</p>
			</div>
		</div>
	</div>
@endsection