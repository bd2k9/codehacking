@extends('layouts.admin')



@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method' => 'POST', 'action'=> 'AdminPostsController@store', 'files' => true]) !!}

    <div class = "form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class = "form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', array('' => 'options'), null,['class'=>'form-control']) !!}
        </div>

    <div class = "form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::file('title',['class'=>'form-control']) !!}
        </div>
    <div class = "form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

    <div class = "form-group">
        {!! Form::submit('Create Post',['class'=>'btn btn-primary', 'rows' => 3]) !!}
    </div>

    {!! Form::close() !!}



@stop