@extends('layouts.app')

@section('content')
    <a href="/sells" class = "btn btn-secondary"> Go Back</a>
    <h1>{{$sell->booktitle}}</h1>
    <h4>{{$sell->bookauthor}}</h4>
    <img style="max-height:150px;" src="/storage/book_images/{{$sell->book_image}}">

    <div style="color:red;"><small>Posted On {{$sell->created_at}} <p style="color:blue;">{{$sell->user->name}}
    <br>{{$sell->user->email}}</p>
    </small></div>
    <hr>
    <div>
        <table class="table">
            <tbody>
              <tr>
                <td>Book Status/Condition</td>
                <td>{{$sell->condition}}</td>
              </tr>
              <tr>
                <td>Book Price</td>
                <td>{{$sell->price}}</td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td>{{$sell->quantity}}</td>
              </tr>
            </tbody>
          </table>
    </div>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $sell->user_id)
            <a href="/sells/{{$sell->id}}/edit"  class="btn btn-info"> Edit </a>
            <a href= "mailto:" + {{$sell->user->email}} class="btn btn-info"> Buy Book </a>
            {!!Form::open(['action' => ['SellsController@destroy', $sell->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection