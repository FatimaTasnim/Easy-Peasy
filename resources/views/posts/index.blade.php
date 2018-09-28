@extends('layouts.app')

@section('content')
    <h1> Posts <h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="shadow p-4 mb-4 bg-white" >
                <div class="row">
                    <div class="col-md-4 col sm-4">
                        <img style="max-height:150px;" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-4 col sm-8" style="font-size:13px">
                        <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                        <div style="color:brown;"><small style="font-size:10">Posted On {{$post->created_at}}<p style="color:blueviolet;">by {{$post->user->name}}</p> </small></div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="pagination pagination-sm justify-content-center">
            {{$posts->links()}}
        </div>
        @else
            <p style="color: red"> No Post Found </p>
    @endif
@endsection