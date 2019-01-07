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


                            <div class="jumbotron break-word">
                                <h3><u>{{ $post->title }}</u></h3>
                                <p class="lead"><em>{{ $post->description }}</em></p>
                                <p class="well">{{ $post->content }}</p>
                                <p class="btn-default">Posted by: <strong>{{ $post->user->name }}</strong></p>
                                <a href="{{ url("/categories/".$post->category->id) }}"><p class="badge pull-right">{{ $post->category->name }}</p></a>
                                <p class="label label-info small">{{ $post->updated_at->diffForHumans() }}</p>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection









