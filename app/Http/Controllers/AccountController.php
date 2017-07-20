<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;


class AccountController extends Controller
{
    /*
	* Makes sure anyone using this controller is authenticated
	*/
	public function __construct()
    {
    }

    /*
    * returns a view to the form which allows the user to add a new member
    */
    public function addView()
    {
    	if(!Auth::check())
    	{
    		return redirect('/login');
    	}

    	$user = User::find(Auth::id());
    	if(!$user['admin'])
    	{
    		$error = 'you do not have the adminstrative privelages to view this page' ;
    		return view('/accounts/view', compact('user', 'error'));
    	}

    	return view('/accounts/add');
    }

	/*
	* returns all the authenticated user's info
	*/
	public function viewAuth()
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		return view('/accounts/view', compact('user'));
	} 
	/*
	* returns all the info of user who belong to the given id
	*/
	public function view($id)
	{
		$user;
		$member = User::findOrFail($id);
		$user = User::find(Auth::id());
		if(Auth::check())
		{
			return view('/accounts/member', compact(['member', 'user']));
		}
		return view('/accounts/member', compact('member'));
		
	}
	/*
	* returns a view with all the members displayed
	*/
	public function viewAll()
	{
		$users = User::all();
		return view('/accounts/all', compact('users'));
	}

	/*
	* returns the form that allows the user to change his basic info
	*/
	public function basic()
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		return view('/accounts/basic', compact('user'));
	}
	/*
	* returns the form that allows the user to change his basic info
	*/
	public function personal()
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		return view('/accounts/personal', compact('user'));
	}
	/*
	* returns the form that allows the user to change his password
	*/
	public function password()
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		return view('/accounts/password', compact('user'));
	}

	/*
	* Updates the basic info
	*/ 
	public function edit_basic(Request $request)
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		// doesnot change unless an input is provided
		if($request->name != "")
		{
			$user->name = $request->name;
		}
		if($request->number != "")
		{
			$user->number = $request->number;
		}
		if($request->email != "")
		{
			$user->email = $request->email;
		}
		$user->save();
		return redirect('/profile');			

	}
	/*
	* Updates the personal info
	*/ 
	public function edit_personal(Request $request)
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}

		$user = User::find(Auth::id());
		// doesnot change unless an input is provided
		$user->summary = $request->summary;
		$user->save();
		return redirect('/profile');			

	}

	/*
	* updates the password
	*/
	public function edit_password(Request $request)
	{
		if(!Auth::check())
    	{
    		return redirect('/login');
    	}
		// makes sure the user is authenticated first
		if(!Auth::check())
		{
			return redirect('/login');
		}
		$user = User::find(Auth::id());
		// makes sure the user provided the correct old password
		if (!Hash::check($request->old, $user->password)) 
		{
			$error = "You provided an incorrect Password";
			return view('/accounts/password', compact('user', 'error'));
		}
		else if($request->newpass != $request->newpass2 || $request->newpass = "" || !isset($request->newpass))
		{
			$error = "the two passwords do not match";
			return view('/accounts/password', compact('user', 'error'));
		}
		else
		{	
			// finaly saves the password
			$user->password = Hash::make($request->input('newpass'));
        	$user->save();
			return redirect('/profile');
		}
		

	}
	

}
