@extends('layouts.default')


@section('content')
	<h3 style="text-align: center; color:red">The changes you are about to make is irreversible</h3><br>
	<form method="post" action = "/members/{{$action}}" class = "form-horizontal" enctype="multipart/form-data">
	{{ csrf_field() }}
		<div class = "row">
			<div class = "col-md-offset-4 col-xs-offset-4">
				<div class = "form-group  col-md-6 col-xs-6">
					<input style="text-align: center;" id = "password-form" class = "form-control" type = "password" name = "password" placeholder="Type in your password">
				</div>
			</div>
		</div>
		<input type = "hidden" name = "id" value = "{{$user['id']}}">
		<div class = "row">
			<div class = "col-md-offset-5 col-xs-offset-4">
				<div class = "form-group  col-md-6 col-xs-6" style="margin-right: 1%;">
			      		<button type="submit" class="btn btn-default" id = "submit" style="width: 150px;">Submit</button>
			     </div>
			</div>
		</div>

	</form>

	@if(isset($error))
		<div style="color:red; text-align: center;">{{$error}}</div>
	@endif
@endsection