<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\Activity;
use Auth;
class EventController extends Controller
{
    
    // Returns all of the events
   public function index()
   {
       $events = Event::Orderby('start_at', 'desc')->get();
       return view('events/index',compact('events'));
   }
    /*
    * views the event info by id
    */
    public function view($id)
    {
    	// gets the project info and the name of the upoader
    	$event = Event::find($id);
    	$event['name'] = User::find($event['user_id'])['name'];
    	return view('/events/view', compact('event'));
    }

    /*
    * renders the appropraite view
    */
    public function addView()
    {
    	if(Auth::check())
    	{
    		return view('events/add');
    	}
    	else
    	{
    		redirect('/login');
    	}
    	
    }

   /*   TODO There is a bug when the user enters an invalid  date like 901924-01294-01294 then the server 
    *   will send a runtime error
    */
    public function add(Request $request)
    {
    	//checks to see if the user is authenticated
    	if(!Auth::check())
    	{
			return redirect('/login');
    	}
    	// makes sure there is a title 
    	if(strlen($request->title) == 0)
		{
			return redirect('/events/add');
		}
	
		$title = $request->title;
		$description  = $request->description;
        $location = $request->location;
		$start_at = $request->strtTime;
        $end_at = $request->endTime;

		// creates a new Entity in the database
        $event = new Event();
        $event->user_id = Auth::id();
        $event->title = $title;
        $event->description = $description;
        $event->location = $location;
        $event->start_at = $start_at;
        $event->end_at = $end_at;
        $event->created_at = date("Y-m-d H:i:s");
		$event->updated_at = date("Y-m-d H:i:s");
        $event->save();
        
	    // creates a new activity log
		$activity = new Activity();
		$activity->user_id = Auth::id();
		$activity->activity = 'create';
		$activity->title = $title;
		$activity->created_at = date("Y-m-d H:i:s");
		$activity->updated_at = date("Y-m-d H:i:s");
		$activity->save();

		return redirect('/events');
    }
    
     /*
    * Deletes an event from the database
    */
    public function delete($id)
    {

    	//checks if the user trying to delete data is authenticated
    	if(Auth::check())
    	{
    		$event = Event::find($id);
    		if(sizeof($event) != 0)
    		{
    			// creates a new activity for the activity log
	    		$activity = new Activity();
	    		$activity->user_id = Auth::id();
	    		$activity->activity = 'delete';
	    		$activity->title = $event['title'];
	    		$activity->created_at = date("Y-m-d H:i:s");
	    		$activity->updated_at = date("Y-m-d H:i:s");
	    		$activity->save();
	    		$event->delete();
    		}
    		return redirect('/events');
    		
    	}
    	else
    	{
    		return redirect('/login');
    	}
    }
}
