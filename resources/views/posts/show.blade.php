@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if (session('status'))
                            {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        @endif


                            <div class="jumbotron">
                                <h1>{{ $post->title }}</h1>
                                <p class="lead">{{ $post->description }}</p>
                                <p class="well">{{ $post->content }}</p>
                                <p>{{ $post->user->name }}</p>
                                <a href="{{ url("/categories/".$post->category->id) }}"><p class="badge pull-right">{{ $post->category->name }}</p></a>
                                <p class="label label-info small">{{ $post->updated_at->diffForHumans() }}</p>
                            </div>








                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection









