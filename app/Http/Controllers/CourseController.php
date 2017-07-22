<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Activity;
use Auth;

class CourseController extends Controller
{
     
    // Returns all of the Courses
   public function index()
   {
       $courses = Course::get();
       return view('courses/index',compact('courses'));
   }
    /*
    * views the event info by id
    */
    public function view($id)
    {
    	// gets the project info and the name of the upoader
    	$course = Course::find($id);
    	$course['name'] = User::find($course['user_id'])['name'];
    	return view('/courses/view', compact('course'));
    }

    /*
    * renders the appropraite view
    */
    public function addView()
    {
    	if(Auth::check())
    	{
    		return view('courses/add');
    	}
    	else
    	{
    		redirect('/login');
    	}
    	
    }

    public function add(Request $request)
    {
    	//checks to see if the user is authenticated
    	if(!Auth::check())
    	{
			return redirect('/login');
    	}
    	// Form validation
    	if(strlen($request->title) == 0 || strlen($request->description) == 0 || strlen($request->instructor)==0)
		{
			return redirect('/courses/add');
		}
	
		$title = $request->title;
		$description  = $request->description;
        $instructor = $request->instructor;
        
		// creates a new Entity in the database
        $course = new Course();
//        $course->id = Auth::id();
        $course->title = $title;
        $course->description = $description;
        $course->instructor = $instructor;
        $course->created_at = date("Y-m-d H:i:s");
		$course->updated_at = date("Y-m-d H:i:s");
        $course->save();
        
	    // creates a new activity log
		$activity = new Activity();
		$activity->user_id = Auth::id();
		$activity->activity = 'create';
		$activity->title = $title;
		$activity->created_at = date("Y-m-d H:i:s");
		$activity->updated_at = date("Y-m-d H:i:s");
		$activity->save();

		return redirect('/courses');
    }
    
     /*
    * Deletes an event from the database
    */
    public function delete($id)
    {

    	//checks if the user trying to delete data is authenticated
    	if(Auth::check())
    	{
    		$course = Course::find($id);
    		if(sizeof($course) != 0)
    		{
    			// creates a new activity for the activity log
	    		$activity = new Activity();
	    		$activity->user_id = Auth::id();
	    		$activity->activity = 'delete';
	    		$activity->title = $course['title'];
	    		$activity->created_at = date("Y-m-d H:i:s");
	    		$activity->updated_at = date("Y-m-d H:i:s");
	    		$activity->save();
	    		$course->delete();
    		}
    		return redirect('/courses');
    		
    	}
    	else
    	{
    		return redirect('/login');
    	}
    }
}
