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


    <div class="row" style = "padding-top: 5%;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a new member</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/members/add">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Admin?</label>

                            <div class="col-md-6">
                                <input type="checkbox" name="admin" value="admin">
                            </div>
                        </div>


                         @if(isset($error))
                             <div style="color:red">{{$error}}</div>
                             @endif
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-7">
                                <button type="submit" class="btn btn-primary">
                                    Add Member
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection