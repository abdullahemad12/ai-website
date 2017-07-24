<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Activity;
use Auth;
use Storage;
class ProjectController extends Controller
{
	/*
	* retrieves all the ordered Projects and passes them to the view 
	*/
    public function index()
    {
    	$projects = Project::OrderBy('created_at', 'desc')->get();
    	return view('projects/index', compact('projects'));
    }

    /*
    * views the project info by id
    */
    public function view($id)
    {
    	// gets the project info and the name of the upoader
    	$project = Project::find($id);
    	$project['name'] = User::find($project['user_id'])['name'];
    	return view('/projects/view', compact('project'));
    }

    /*
    * renders the appropraite view
    */
    public function addView()
    {
    	if(Auth::check())
    	{
    		return view('projects/add');
    	}
    	else
    	{
    		redirect('/login');
    	}
    	
    }

    /*
    * Takes the input from the user form and an uploaded file.. Writes the file to the docs directory with a random name
    * stores the new entity in the projects database and creates a new activity log
    */
    public function add(Request $request)
    {
    	//checks to see if the user is authenticated
    	if(!Auth::check())
    	{
			return redirect('/login');
    	}
    	// makes sure there is a title 
    	if(strlen($request->title) == 0 ||strlen($request->description) == 0)
		{
			return redirect('/projects/add');
		}

		// checks whether a file was uploaded
		if($request->file('file') != null)
		{
			// uploads the file to docs
	    	$file = $request->file('file');
			$path = $file->storeAs('docs', $file->getClientOriginalName());
			$rand_str = "";
			// this makes sure the random generated name is not already in use
			do
			{
				//generates a random name
				$hay = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
				for($i = 0; $i < 12; $i++)
				{
					$needle = rand(0, strlen($hay));
					$rand_str = $rand_str . $hay[$needle];
				}
		    
				//checks for the extension and assigns a random name
				if($file->getClientOriginalExtension() != "")
				{
					$rand_str = $rand_str . '.' . $file->getClientOriginalExtension();
				}	
			}while(file_exists($rand_str));
			
			
			// writes a copy of the file to the public directore for access
			echo($path);
			$contents = Storage::get($path);
			$file_tmp = fopen('docs/'. $rand_str, "w");
			fwrite($file_tmp, $contents);
			fclose($file_tmp);
			Storage::delete($path);
			$url = 'docs/'. $rand_str;
			

		}
		else
		{
				// url that will be inserted in the data base
				$url = 'none';
		}
		


	
		$title = $request->title;
		$summary  = $request->summary;
		

		// creates a new Entity in the database
		$project = new Project();
		$project->user_id = Auth::id();
		$project->title = $title;
		$project->description = $summary;
		$project->url = $url;
		$project->created_at = date("Y-m-d H:i:s");
	    $project->updated_at = date("Y-m-d H:i:s");
	    $project->save();

	    // creates a new activity log
		$activity = new Activity();
		$activity->user_id = Auth::id();
		$activity->activity = 'create';
		$activity->title = $title;
		$activity->created_at = date("Y-m-d H:i:s");
		$activity->updated_at = date("Y-m-d H:i:s");
		$activity->save();

		return redirect('/projects');
    }



    /*
    * Deletes a project from the database
    */
    public function delete($id)
    {

    	//checks if the user trying to delete data is authenticated
    	if(Auth::check())
    	{
    		$project = Project::find($id);
    		if(sizeof($project) != 0)
    		{
    			// creates a new activity for the activity log
	    		$activity = new Activity();
	    		$activity->user_id = Auth::id();
	    		$activity->activity = 'delete';
	    		$activity->title = $project['title'];
	    		$activity->created_at = date("Y-m-d H:i:s");
	    		$activity->updated_at = date("Y-m-d H:i:s");
	    		$activity->save();
	    		if(file_exists($project->url))
	    		{
	    			unlink($project->url);
	    		}
	    		$project->delete();
    		}
    		return redirect('/projects');
    		
    	}
    	else
    	{
    		return redirect('/login');
    	}
    }
    
}
