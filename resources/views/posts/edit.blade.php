@extends('layouts.app')

@section('content')
    <h1> Edit Post </h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
        {!! Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body']) !!}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection