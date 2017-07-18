@extends('/accounts/profile')

@section('style')
	<link href = "/css/profile.css" rel = "stylesheet">
@endsection


@section('profile_info')
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
	@if(isset($error))
		<div style="color:red">{{$error}}</div>
	@endif
@endsection