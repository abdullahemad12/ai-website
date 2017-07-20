@extends('/accounts/profile')

@section('style')
	<link href = "/css/profile.css" rel = "stylesheet">
@endsection


@section('profile_info')
		<h4>Summary</h4> 
	<form method="post" action = "{{URL::to('profile/personal')}}" class = "form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }}
	<div class = "row">
				<div class = "col-md-6 col-xs-6">
					<div class = "form-group  col-md-12 col-xs-12">
						<textarea id = "summary-form" class = "form-control" placeholder="Summary for the project" value="sdfadf"   name = "summary" autocomplete="off" rows = "10" columns = "30">{{$user['summary']}}</textarea> 
					</div>
				</div>
		</div>
		<div class = "row">
			<div class = "col-md-offset-4 col-md-1 col-xs-offset-3 col-xs-2">
				 <div class="form-group"> 
			      		<button type="submit" class="btn btn-default" id = "submit" >Save changes</button>
			  	</div>
			</div>
		</div>

  </form>
@endsection