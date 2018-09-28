@extends('layouts.app')

@section('content')
    <h1> Edit Book Informations </h1>
    {!! Form::open(['action' => ['SellsController@update', $sell->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('booktitle', 'Title', ['class' => 'control-label']) !!}
        {!! Form::text('booktitle', $sell->booktitle, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('bookauthor', 'Author', ['class' => 'control-label']) !!}
            {!! Form::text('bookauthor', $sell->bookauthor, ['class' => 'form-control', 'placeholder' => 'Author']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
        {!! Form::number('price', $sell->price, ['class' => 'form-control', 'placeholder' => 'Price']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('quantity', 'Quantity', ['class' => 'control-label']) !!}
        {!! Form::number('quantity', $sell->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity']) !!}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection