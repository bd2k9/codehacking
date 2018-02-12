@extends('layouts.admin')



@section('content')

    <h1>Create Post</h1>

    <div class = "row">

    {!! Form::open(['method' => 'POST','files' => true, 'action'=> 'AdminPostsController@store', ]) !!}

    <div class = "form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class = "form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null,['class'=>'form-control']) !!}
        </div>

    <div class = "form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',['class'=>'form-control']) !!}
        </div>
    <div class = "form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

    <div class = "form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary', 'rows' => 3]) !!}
    </div>



    {!! Form::close() !!}

</div>

<div class = "row">

    @include('includes.formerror')

</div>

@stop