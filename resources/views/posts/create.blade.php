@extends('layouts.app')

@section('content')
    <h1> Create Post </h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author', 'Author', ['class' => 'control-label']) !!}
        {!! Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Author']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body', ['class' => 'control-label']) !!}
        {!! Form::textarea('body', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body']) !!}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection