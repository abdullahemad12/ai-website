<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AccountController extends Controller
{
	/*
	* Makes sure anyone using this controller is authenticated
	*/
	public function __construct()
    {
        $this->middleware('auth');
    }
	/*
	* returns all the authenticated user's info
	*/
	public function view()
	{
		$user = User::find(Auth::id());
		return view('account');
	} 
}
