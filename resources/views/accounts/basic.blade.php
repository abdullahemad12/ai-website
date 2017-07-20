@extends('/accounts/profile')

@section('style')
	<link href = "/css/profile.css" rel = "stylesheet">
@endsection


@section('profile_info')
	<h4>Change your info</h4> 
	<form method="post" action = "{{URL::to('profile/basic')}}" class = "form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class = "row">
			<div class = "col-md-6 col-xs-6">
				<div class = "form-group  col-md-8 col-xs-8">
					<input id = "name-form" class = "form-control" type = "text" name = "name" autocomplete="off" value = "{{$user['name']}}">
				</div>
			</div>
		</div>
			<div class = "row">
				<div class = "col-md-6 col-xs-6">
					<div class = "form-group  col-md-8 col-xs-8">
					<input id = "number-form" class = "form-control" type = "text" name = "email" autocomplete="off" value = "{{$user['email']}}">
				</div>
				</div>
		</div>
		<div class = "row">
			<div class = "col-md-6 col-xs-6">
				<div class = "form-group  col-md-8 col-xs-8">
					<input id = "name-form" class = "form-control" type = "text" name = "number" autocomplete="off" value = "{{$user['number']}}">
				</div>
			</div>
		</div>
		<div class = "row">
			<div class = "col-md-offset-1 col-md-1 col-xs-offset-1 col-xs-2">
				 <div class="form-group"> 
			      		<button type="submit" class="btn btn-default" id = "submit" >Save changes</button>
			  	</div>
			</div>
		</div>

  </form>
@endsection