@extends('layouts.default')

@section('title')
Projects
@endsection
@section('content')
<style>
	.row
	{
		border-bottom:solid #ddeaff 1px;
		padding-left: 2%;
		padding-bottom: 2%;
		color:black;
		text-decoration: none;
	}
	.row:hover
	{
		background-color: #edf3fc;
		color:#5496f9;
		text-decoration: none;
	}
	.row b
	{
		font-size: 22px;
		font-weight: bold;
	}
	.panel-primary
	{
		margin-bottom:20%;
	}

</style>
 <div class="panel panel-primary">
      <div class="panel-heading"><h1>Projects and Research</h1></div>
      <div class="panel-body">
      	@foreach($projects as $project)
      	<a href = "projects/view/{{$project['id']}}"><div class = "row">
      		<b>{{$project['title']}}</b></br>
      	 	{{$project['created_at']}}
      	</div></a>
      	@endforeach

      </div>
 </div>
@endsection