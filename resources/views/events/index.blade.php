@extends('layouts.default') @section('title') Events @endsection @section('content')
<style>
    .row {
        border-bottom: solid #ddeaff 1px;
        padding-left: 2%;
        padding-bottom: 2%;
        color: black;
        text-decoration: none;
    }
    
    .row:hover {
        background-color: #edf3fc;
        color: #5496f9;
        text-decoration: none;
    }
    
    .row b {
        font-size: 22px;
        font-weight: bold;
    }
    
    .panel-primary {
        margin-bottom: 20%;
    }

</style>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h1>Events</h1>
    </div>
    <div class="panel-body">
        @foreach($events as $event)
        <a href="events/view/{{$event['id']}}">
            <div class="row">
                <h2>{{$event['title']}}</h2><br> {{$event['started_at']}}
                <h4>location: {{$event['location']}}</h4>
                <p>{{$event['description']}}</p>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection
