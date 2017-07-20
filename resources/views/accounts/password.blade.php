@extends('/accounts/profile')

@section('style')
	<link href = "/css/profile.css" rel = "stylesheet">
@endsection


@section('profile_info')
	<h4>Change your password</h4> 
	<form method="post" action = "{{URL::to('profile/password')}}" class = "form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class = "row">
			<div class = "col-md-6 col-xs-6">
				<div class = "form-group  col-md-8 col-xs-8">
					<input id = "password-form" class = "form-control" type = "password" name = "old" placeholder="Old Password">
				</div>
			</div>
		</div>
			<div class = "row">
				<div class = "col-md-6 col-xs-6">
					<div class = "form-group  col-md-8 col-xs-8">
					<input id = "password-form" class = "form-control" type = "password" name = "newpass" placeholder="New Password">
				</div>
				</div>
		</div>
		<div class = "row">
			<div class = "col-md-6 col-xs-6">
				<div class = "form-group  col-md-8 col-xs-8">
				<input id = "password-form" class = "form-control" type = "password" name = "newpass2" placeholder="Confirm Password">
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
		@if(isset($error))
		<div style="color:red">{{$error}}</div>
		@endif
  </form>
@endsection