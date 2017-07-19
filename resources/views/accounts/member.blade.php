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
				{{$member['name']}}
			</div>
			<div class = "row" id = "email">
				<span class="glyphicon glyphicon-envelope"></span> {{$member['email']}}
			</div>
			<div class = "row" id = "email">
				<span class="glyphicon glyphicon-earphone"></span> 0{{$member['number']}}
			</div>
			<div class = "row" id = "created_at">
				<span class="glyphicon glyphicon-calendar"></span> Joined on: {{$member['created_at']}}
			</div>
			<div class = "row" id = "summary">
				Summary: 
				<p>{{$member['summary']}}</p>
			</div>

		@if(Auth::check())
			@if(isset($user) && $user['admin'] && $member['name'] != "admin")
			<div id = "row">
				<div class="col-md-offset-7 col-md-2 col-xs-offset-8 col-xs-2">
					<a class="btn btn-danger" href = "{{'/members/delete/' . $member['id']}}">Remove</a>
				</div>
				@if(!$member['admin'])
				<div class = "col-md-1 col-xs-1">
					<a class="btn btn-success" href="{{'/members/makeadmin/' . $member['id']}}">Make Admin</a>
				</div>
				@endif
			</div>
			@endif
		@endif
		</div>
	</div>





@endsection