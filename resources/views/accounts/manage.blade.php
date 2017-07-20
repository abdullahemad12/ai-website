@extends('layouts/default')

@section('style')
  <!-- https://github.com/twitter/typeahead.js/ -->
  <script src="/js/framework/typeahead.jquery.min.js" type="text/javascript"></script>
  <script src="/js/framework/underscore-min.js" type="text/javascript"></script>
  <script src="/js/search.js" type="text/javascript"></script>

  <style>
  	.tt-dropdown-menu
  	{
  		background-color: #e0ebfc;
  		width:100%;
  	}
  	.tt-dropdown-menu:hover
  	{
  		 cursor:pointer;
  	}

  </style>

@endsection
@section('content')
  <!-- http://getbootstrap.com/css/#forms -->
  		
	  	<h1 style="text-align:center; margin-left: -3%"><span class="glyphicon glyphicon-search"></span> Search for Members</h1>
  		<div class = "row">
  			<div class = "col-md-offset-3 col-md-6 col-xs-offset-4 col-xs-6">
	            <form class="form-inline" id="form" role="form">
	                <div class="form-group">
	                    <label class="sr-only" for="q">Search For Members</label>
	                    <input class="form-control" id="q" placeholder="Member Name" type="text" style="width: 500px; text-align: center" />
	                </div>
	            </form>
	       	</div>
        </div>
@endsection