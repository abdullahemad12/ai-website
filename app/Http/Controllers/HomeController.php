<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newEvents = Event::take(5)
                  ->where('start_at','>=',DB::raw('NOW()'))
                  ->orderBy('start_at', 'desc')
                  ->get();
        
        $oldEvents = Event::take(5)
                    ->where('start_at','<',DB::raw('NOW()'))
                    ->orderBy('start_at', 'desc')
                    ->get();
        return view('home',compact('newEvents'),compact('oldEvents'));
    }
}
