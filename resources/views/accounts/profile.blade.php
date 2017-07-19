@extends('layouts/default')

@section('title')
{{$user['name']}}
@endsection

@section('content')
	<div class="container">
		
		<div class="row" id = "sidebar">
			<div class="col-sm-4 col-md-3 sidebar">
	   
	    		<div class="list-group">
		        	<a href="/profile" id = "sidebar-header"><span href="#" class="list-group-item active">
		            	My Account
		            	<span class="pull-right" id="slide-submenu">
		                	<i class="fa fa-times"></i>
		            	</span>
		       		 </span>
		       		 </a>
			        <a href="/profile/basic" class="list-group-item">
			            <i class="fa fa-comment-o"></i> Basic Info
			        </a>
			        <a href="/profile/personal" class="list-group-item">
			            <i class="fa fa-search"></i> Personal Info
			        </a>
			        <a href="/profile/password" class="list-group-item">
			            <i class="fa fa-user"></i> Change Password
			        </a>
			        @if($user['admin'])
			        <a href="#" class="list-group-item">
			            <i class="fa fa-folder-open-o"></i> Manage members
			        </a>
			        @endif
	    		</div>        
			</div>
			<div class="col-sm-12 col-md-9 sidebar">
				@yield('profile_info')
	   		</div>
		</div>
	</div>
@endsection
