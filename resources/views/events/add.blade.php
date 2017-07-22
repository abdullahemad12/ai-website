@extends('layouts.default') @section('title') Add an Event @endsection @section('content')

<h1> Add a new Event!</h1>
<br>
<form method="post" action="{{URL::to('events/add')}}" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <!-- Title of the Event -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="form-group  col-md-8 col-xs-8">
                <label>Title</label>
                <input id="comment_field" class="form-control" type="text" placeholder="Title of the Event" name="title" autocomplete="off">
            </div>
        </div>
    </div>


    <!-- Location of the Event -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="form-group  col-md-8 col-xs-8">
                <label>Location</label>
                <input id="comment_field" class="form-control" type="text" placeholder="Location of the Event" name="location" autocomplete="off">
            </div>
        </div>
    </div>


    <!-- Start Time of the Event -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="form-group  col-md-8 col-xs-8">
                <label>Start Time</label>
                <input id="comment_field" class="form-control" type="datetime-local" placeholder="Start Time of the Event" name="strtTime" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- End Time of the Event -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="form-group  col-md-8 col-xs-8">
                <label>End Time</label>
                <input id="comment_field" class="form-control" type="datetime-local" placeholder="End Time of the Event" name="endTime" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Description of the Event -->
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <div class="form-group  col-md-12 col-xs-12">
                <label>Description</label>
                <textarea id="comment_field" class="form-control" placeholder="Description for the Event" name="description" autocomplete="off" rows="10" columns="30"></textarea>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-md-4 col-xs-4">
        </div>
        <div class="col-md-offset-1 col-md-1 col-xs-offset-1 col-xs-2">
            <div class="form-group">
                <button type="submit" class="btn btn-default" id="submit ">Submit</button>
            </div>
        </div>
    </div>

</form>

@endsection
