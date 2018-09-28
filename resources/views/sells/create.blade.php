@extends('layouts.app')

@section('content')
    <h1> Add a Book to Sell </h1>
    {!! Form::open(['action' => 'SellsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('booktitle', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('booktitle', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bookauthor', 'Author', ['class' => 'control-label']) !!}
        {!! Form::text('bookauthor', null, ['class' => 'form-control', 'placeholder' => 'Author']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('condition', 'Condition', ['class' => 'control-label']) !!}
        {!! Form::text('condition', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Condition']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
        {!! Form::number('price', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Price']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity', ['class' => 'control-label']) !!}
        {!! Form::number('quantity', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quantity']) !!}
    </div>
    <div class="form-group">
        {{Form::file('book_image')}}
    </div>
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection