@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($which) >0 )
        <ol class="list-group">
            @foreach($which as $service)
            <li class= "list-group-item"> {{$service}}</li>
            @endforeach
        </ol>
    @endif
    <h1>It's Service Page!</h1>
@endsection