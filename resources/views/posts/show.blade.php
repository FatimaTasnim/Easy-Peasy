@extends('layouts.app')

@section('content')
    <a href="/posts" class = "btn btn-secondary"> Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="max-height:150px;" src="/storage/cover_images/{{$post->cover_image}}">

    <div style="color:red;"><small>Written On {{$post->created_at}} <p style="color:blue;">{{$post->user->name}}</small></div>
    <hr>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit"  class="btn btn-info"> Edit </a>

            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection