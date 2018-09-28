@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h2 style = "margin-top: 10px; color: #F75D59"> Welcome to EasyPeasy </h2>
                        <div style= "margin-top:20px;">
                        <a href="posts/create" class="btn btn-primary"> Post Review</a>
                        <a href="sells/create" class="btn btn-info"> Add a Book to sell</a>
                        </div>
                </div>
            </div>
            <div class="card" style="margin-top:10px;">
                <div class="card-header">Your Posts</div>
                <div class="card-body">
                    <table class="table table-striped">
                    @if(count($posts)>0)
                       @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td class="float-right"><a href = "/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>

                       @endforeach
                    @endif
                    @if(count($sells)>0)
                       @foreach ($sells as $sell)
                            <tr>
                                <td>{{$sell->booktitle}}</td>
                                <td class="float-right"><a href = "/sells/{{$sell->id}}/edit" class="btn btn-primary">Edit</a></td>
                                <td>
                                    {!!Form::open(['action' => ['SellsController@destroy', $sell->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>

                       @endforeach
                    
                    </table>
                    @endif
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection
