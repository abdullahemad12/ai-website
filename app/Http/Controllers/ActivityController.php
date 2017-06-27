<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Activity;
use App\User;
class ActivityController extends Controller
{
	/*
	* Makes sure only authenticated users are able to view this
	*/
	public function __construct()
    {
        $this->middleware('auth');
    }
    /*
    * view all the activities done by the user
    */
	public function index()
	{		
		// retrieves all the activities 
		$activities = Activity::orderBy('created_at', 'desc')->get();
		$usernames = [];

		// loops over the activities and retrieves the username of the performer
		foreach($activities as $activity)
		{	
			$user = User::find($activity['user_id']);
			array_push($usernames, $user );
		}
		// passes all the usernames and activities to the view
		return view('activities', compact('activities', 'usernames'));
	}
    
}
