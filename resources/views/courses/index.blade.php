@extends('layouts.default') @section('title') Courses @endsection @section('content')
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
        <h1>Courses</h1>
    </div>
    <div class="panel-body">
        @foreach($courses as $course)
        <a href="courses/view/{{$course['id']}}">
            <div class="row">
                <h2>{{$course['title']}}</h2>
                <h5>Instructor: {{$course['instructor']}}</h5>
                <p>{{$course['description']}}</p>
            </div>
        </a>
        @endforeach

    </div>
</div>
@endsection
