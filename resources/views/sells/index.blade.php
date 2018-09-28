@extends('layouts.app')

@section('content')
    <h1> Books for Sell <h1>
    @if(count($sells)>0)
        @foreach($sells as $sell)
            <div class="shadow p-4 mb-4 bg-white" >
                <div class="row">
                    <div class="col-md-4 col sm-4">
                        <img style="max-height:150px;" src="/storage/book_images/{{$sell->book_image}}">
                    </div>
                    <div class="col-md-4 col sm-8" style="font-size:13px">
                        <h4><a href="/sells/{{$sell->id}}">{{$sell->booktitle}}</a></h4>
                        <h5>Author: {{$sell->bookauthor}}</h5>
                        <div style="color:brown;"><small style="font-size:10">Posted On {{$sell->created_at}}<p style="color:blueviolet;">by {{$sell->user->name}}</p> </small></div>
                        <a href= "mailto:" + {{$sell->user->email}} class="btn btn-info"> Buy Book </a>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="pagination pagination-sm justify-content-center">
            {{$sells->links()}}
        </div>
        @else
            <p style="color: red"> No books available </p>
    @endif
@endsection