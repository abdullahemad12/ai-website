<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Activity;
use Auth;
use Mail;


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
    public function manageView()
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

    	return view('/accounts/manage');
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

	/*
	* returns a form that requests the users password
	*/
	public function deleteView($id)
	{	
		// makes sure the user is authenticated 
		if(!Auth::check())
		{
			return redirect('/');
		}
		// makes sure the user is an admin
		if(!User::find(Auth::id())['admin'])
		{
			return redirect('/profile');
		}
		$user = User::find($id);

		// makes sure it's not the 'admin account'
		if($user['id'] == 1)
		{
			redirect('profile');
		}
		$action = "delete";
		return view('/accounts/auth', compact('action', 'user'));

	}
	/*
	* returns a form that requests the users password
	*/
	public function makeadminView($id)
	{
		// makes sure the user is authenticated 
		if(!Auth::check())
		{
			return redirect('/');
		}
		// makes sure the user is an admin
		if(!User::find(Auth::id())['admin'])
		{
			return redirect('/profile');
		}
		$user = User::find($id);

		// makes sure it's not the 'admin account'
		if($user['id'] == 1)
		{
			redirect('profile');
		}
		$action = "makeadmin";
		return view('/accounts/auth', compact('action', 'user'));
	}

	/*
	* deletes the account of the given
	*/
	public function delete(Request $request)
	{
		$member = User::find($request->id);

		// makes sure the user is authenticated 
		if(!Auth::check())
		{
			return redirect('/');
		}
		// makes sure the user is an admin
		if(!User::find(Auth::id())['admin'])
		{
			return redirect('/profile');
		}

		$auth = User::find(Auth::id());
		// checks the password
		if (!Hash::check($request->password, $auth->password)) 
		{
			$user = User::find($request->id);
			$error = "You provided an incorrect Password";
			$action = "delete";
			return view('/accounts/auth', compact('action', 'user', 'error'));
		}

		//deletes the account
		User::destroy($request->id);


		// creates a new activity log
		
		$activity = new Activity();
		$activity->user_id = Auth::id();
		$activity->activity = 'delete';
		$activity->title = $member->name;
		$activity->created_at = date("Y-m-d H:i:s");
		$activity->updated_at = date("Y-m-d H:i:s");
		$activity->save();
		return redirect('/activities');
	}


	/*
	* Makes the account of the given id an admin
	*/
	public function makeadmin(Request $request)
	{
		// makes sure the user is authenticated 
		if(!Auth::check())
		{
			return redirect('/');
		}
		// makes sure the user is an admin
		if(!User::find(Auth::id())['admin'])
		{
			return redirect('/profile');
		}

		$auth = User::find(Auth::id());
		// checks the password
		if (!Hash::check($request->password, $auth->password)) 
		{
			$user = User::find($request->id);
			$error = "You provided an incorrect Password";
			$action = "makeadmin";
			return view('/accounts/auth', compact('action', 'user', 'error'));
		}

		//make admin 
		$user = User::findOrFail($request->id);
		$user->admin = true;
		$user->save();

		// creates a new activity log
		$user = User::find($request->id);
		$activity = new Activity();
		$activity->user_id = Auth::id();
		$activity->activity = 'update';
		$activity->title = $user->name;
		$activity->created_at = date("Y-m-d H:i:s");
		$activity->updated_at = date("Y-m-d H:i:s");
		$activity->save();

		return redirect('/members/'. $request->id);

	}



	/*
	* Search for a given name in the database and returns if as a json object
	*/
	public function search($name)
	{
		$users;
		if($name == "all")
		{
			$users = User::get();
		}
		else
		{
			$users = User::search($name);

		}
		return json_encode($users,JSON_PRETTY_PRINT);
	}
	

	/*
	* Add a new member
	*/
	public function CreateMember(Request $request)
	{
		//makes sure the user is logged in
		if(!Auth::check())
		{
			return redirect('/');
		}
		// makes sure the user is an admin
		$user = User::find(Auth::id());
		if(!$user['admin'])
		{
			$title = "You are not an admin";
			$body = "You don't have the privelages to complete such an action. Only admins are allowed to add new members to the community";
			return view('apology', compact('title', 'body'));
		}

		// checks if the email already exist
		if (User::where('email', '=', $request->email)->count() > 0) {
			$error = "member already exists !";
			return view('/accounts/manage', compact("error"));
		}

		$password = "";
		//generates a random name
		$hay = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
		for($i = 0; $i < 12; $i++)
		{
			$needle = rand(0, strlen($hay));
			$password = $password . $hay[$needle];
		}


		$data = array(
        'email' => $request->email,
        'password' => $password);

        $email = $request->email;

    Mail::send('mail.member', $data, function ($message) use ($email) {

        $message->from('machinelearning.guc@gmail.com', 'Learning Laravel');

        $message->to($email)->subject('Machine Learning GUC');

    });

    // creates member in the data base
    $member = new User();
    $member->name = $request->name;
    $member->email = $request->email;
    $member->password = Hash::make($password);
   	
    // creates the member with admin privilages
   	if(isset($request->admin) && $request->admin = "admin")
   	{
   		$member->admin = true;
   	}
   	else
   	{
   		$member->admin = false;
   	}

    $member->save();

	// creates a new activity log
	$activity = new Activity();
	$activity->user_id = Auth::id();
	$activity->activity = 'create';
	$activity->title = $request->name;
	$activity->created_at = date("Y-m-d H:i:s");
	$activity->updated_at = date("Y-m-d H:i:s");
	$activity->save();



    return redirect('/members/' . $member->id);

	}

}
