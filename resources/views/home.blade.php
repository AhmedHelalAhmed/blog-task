@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{--<div class="panel-heading">Dashboard</div>--}}

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                        <div class="row">
                            <div class="col-lg-4">
                                <h2>Post title</h2>
                                <p class="text-danger">post description</p>
                                <p class="badge">post category</p>
                                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Post title</h2>
                                <p>post description</p>
                                <p class="badge">post category</p>
                                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Post title</h2>
                                <p>post description</p>
                                <p class="badge">post category</p>
                                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Post title</h2>
                                <p class="text-danger">post description</p>
                                <p class="badge">post category</p>
                                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                            </div>
                            <div class="col-lg-4">
                                <h2>Post title</h2>
                                <p>post description</p>
                                <p class="badge">post category</p>
                                <p><a class="btn btn-primary" href="#" role="button">View details »</a></p>
                            </div>


                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
