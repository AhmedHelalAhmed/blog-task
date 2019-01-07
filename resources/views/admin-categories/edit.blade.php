@extends('layouts.admin')
@section('heading')
    <span class="capital-first-letter">edit</span> a post
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form id="category-form" role="form" action="{{ url('/admin/categories/'.$category->id) }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    {{method_field('PUT')}}
                </div>

                @include('admin-categories._form')

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