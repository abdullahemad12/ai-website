<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Activity;
use App\User;
class ActivityController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{		
		$activities = Activity::orderBy('created_at', 'desc')->get();
		$usernames = [];
		foreach($activities as $activity)
		{	
			$user = User::find($activity['user_id']);
			array_push($usernames, $user );
		}
		return view('activities', compact('activities', 'usernames'));
	}
    
}
