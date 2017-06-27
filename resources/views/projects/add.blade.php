@extends('layouts.default')

@section('title')
Add a project
@endsection

@section('content')
<style>
#file
{
	padding-left: 2%;
}
</style>
<h1> Add a new Project!</h1>
<br>
<div class = "add_file">
	<form method="post" action = "{{URL::to('projects/add')}}" class = "form-horizontal" enctype="multipart/form-data">
			{{ csrf_field() }}
		<div class = "row">
			<div class = "col-md-6 col-xs-6">
				<div class = "form-group  col-md-8 col-xs-8">
					<input id = "comment_field" class = "form-control" type = "text"  placeholder="Title of the Project" name = "title" autocomplete="off">
				</div>
			</div>
		</div>
			<div class = "row">
				<div class = "col-md-6 col-xs-6">
					<div class = "form-group  col-md-12 col-xs-12">
						<textarea id = "comment_field" class = "form-control" placeholder="Summary for the project"   name = "summary" autocomplete="off" rows = "10" columns = "30"></textarea> 
					</div>
				</div>
		</div>

		<div class = "row">
			<div class = "col-md-4 col-xs-4"">
				<div class="form-group">
					<input type="file" name="file" id="file">
				</div>
			</div>
			<div class = "col-md-offset-1 col-md-1 col-xs-offset-1 col-xs-2">
				 <div class="form-group"> 
			      		<button type="submit" class="btn btn-default" id = "submit" >Submit</button>
			  	</div>
			</div>
		</div>

  </form>
</div>


@endsection