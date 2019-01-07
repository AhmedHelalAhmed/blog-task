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
                {{--<div class="form-group">--}}
                    {{--<label for="title">--}}
                        {{--title--}}
                        {{--<code>Required. at least 35 characters and at most 70 characters</code>--}}
                    {{--</label>--}}
                    {{--<input--}}
                            {{--id="title"--}}
                            {{--value="{{ old('title')?old('title'):$post->title}}"--}}
                            {{--name="title"--}}
                            {{--type="text"--}}
                            {{--class="form-control"--}}
                            {{--placeholder="Enter title..."--}}
                            {{--required minlength=35 maxlength=70 />--}}
                    {{--<span id="title-feedback" class="help-block"></span>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="description">--}}
                        {{--description--}}
                        {{--<code>Required. at least 35 characters and at most 100 characters</code>--}}
                    {{--</label>--}}
                    {{--<textarea--}}
                            {{--id="description"--}}
                            {{--name="description"--}}
                            {{--class="form-control"--}}
                            {{--rows="3"--}}
                            {{--placeholder="Enter description..."--}}
                            {{--required minlength=35 maxlength=100>{{old('description')?old('description'):$post->description}}</textarea>--}}
                    {{--<span id="description-feedback"></span>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="content">--}}
                        {{--content--}}
                        {{--<code>Required. at least 100 characters</code>--}}
                    {{--</label>--}}
                    {{--<textarea--}}
                            {{--id="content"--}}
                            {{--name="content"--}}
                            {{--class="form-control"--}}
                            {{--rows="7"--}}
                            {{--placeholder="Enter content..."--}}
                            {{--required minlength=100>{{old('content')?old('content'):$post->content}}</textarea>--}}
                    {{--<span id="content-feedback" class="help-block"></span>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label for="category">--}}
                        {{--Category--}}
                        {{--<code>Required</code>--}}
                    {{--</label>--}}
                    {{--<select--}}
                            {{--id="category"--}}
                            {{--name="category_id"--}}
                            {{--class="form-control"--}}
                            {{--required>--}}
                        {{--<option value="">Select a category</option>--}}
                        {{--@foreach($categories as $category)--}}
                            {{--<option value="{{$category->id}}"--}}
                                    {{--@if(old('category_id'))--}}
                                        {{--{{ old('category_id')==$category->id? 'selected':'' }}--}}
                                    {{--@else--}}
                                        {{--{{ $post->category_id==$category->id? 'selected':'' }}--}}
                                    {{--@endif>--}}
                                {{--{{ $category->name }}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--<span id="category-feedback" class="help-block"></span>--}}
                {{--</div>--}}
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