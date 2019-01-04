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

                        @foreach($posts as $post)
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h2 class="panel-title text-center">{{$post->title}}</h2>
                                </div>
                                <div class="panel-body">
                                    <p class="well">{{substr($post->description,0,300)}}</p>

                                    <p>
                                        <span class="badge ">{{$post->category->name}}</span>

                                        <a
                                                class="btn btn-primary pull-right"
                                                href="{{url("/posts/".$post->id)}}"
                                           role="button"> Show more »
                                        </a>
                                    </p>

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
