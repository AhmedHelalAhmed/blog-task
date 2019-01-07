@extends('layouts.admin')
@section('heading')
    <span class="capital-first-letter">create</span> new post
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form id="post-form" role="form" action="{{ url("/admin/posts") }}" method="post">
                {{csrf_field()}}

                @include('admin-posts._form')


            </form>


        </div>
    </div>
    <!-- Start Jquery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- End Jquery -->
    <!-- Start frontend validations -->
    <script src="{{ asset('js/validations.js') }}"></script>
    <!-- Start frontend validations -->
@endsection
