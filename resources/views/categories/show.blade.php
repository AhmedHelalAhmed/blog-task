@extends('layouts.app')
@section('content')
<div class="container break-word">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                    {{--<div class="alert alert-success">--}}
                        {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    @endif


                        <div class="panel panel-default">
                            <div class="panel-heading">
                             <h1>
                                 {{ $category->name }}
                                 <span class="badge">{{ count($category->posts) }}</span>
                             </h1>


                            </div>

                            <ul class="list-group">

                                @foreach($category->posts as $post)
                                    <li class="list-group-item">
                                        <a href="{{ url("/posts/".$post->id) }}">{{$post->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>






                </div>
            </div>
        </div>
    </div>
</div>
@endsection
