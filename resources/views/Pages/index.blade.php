@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    @guest
    <h1 style= "color:#F75D59;"> Wellcome To Easy Peasy! </h1>
    <p style="color:blueviolet;"> Here you can buy or sell your old/new books and also check review and post reviews on a book </p>
    <p> <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href = "/registration" role = "button"> register </a>
    </p>
    @else
    <h1 style= "color:#F75D59;"> Wellcome {{ Auth::user()->name }}! </h1>
    <p style="color:blueviolet;"> Here you can buy or sell your old/new books and also check review and post reviews on a book </p>
    <p> <a class="btn btn-primary btn-lg" href="/posts/create" role="button">Post Review</a>
        <a class="btn btn-success btn-lg" href = "/sells/create" role = "button"> Sell books </a>
    </p>
    @endguest

</div>
@endsection