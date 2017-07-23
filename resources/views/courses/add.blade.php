@extends('layouts.default') @section('title') Add a Course @endsection @section('content')

<h1> Add a new Course!</h1>
<br>
<form method="post" action="{{URL::to('courses/add')}}" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <!-- Title of the Course -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group  col-md-8">
                <label>Title</label>
                <input id="comment_field" class="form-control" type="text" placeholder="Title of the Course" name="title" autocomplete="off">
            </div>
        </div>
    </div>


    <!-- Name of the instructor -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group  col-md-8">
                <label>Instructor</label>
                <input id="comment_field" class="form-control" type="text" placeholder="Name of the instructor" name="instructor" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Description of the Course -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group  col-md-12">
                <label>Description</label>
                <textarea id="comment_field" class="form-control" placeholder="Description for the Course" name="description" autocomplete="off" rows="10" columns="30"></textarea>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-offset-1 col-md-1">
            <div class="form-group">
                <button type="submit" class="btn btn-default" id="submit ">Submit</button>
            </div>
        </div>
    </div>

</form>

@endsection
