<div class="form-group">
    <label for="title">
        <span class="capital-first-letter">title</span>
        <code><span class="capital-first-letter">required</span>. at least 35 characters and at most 70 characters</code>
    </label>
    <input
            id="title"
            value="@if(old('title')){{old('title')}}@elseif(isset($post)){{$post->title}}@endif"
            name="title"
            type="text"
            class="form-control"
            placeholder="Enter title..."
            required minlength=35 maxlength=70 />
    <span id="title-feedback" class="help-block"></span>
</div>
<div class="form-group">
    <label for="description">
        <span class="capital-first-letter">description</span>
        <code><span class="capital-first-letter">required</span>. at least 35 characters and at most 100 characters</code>
    </label>
    <textarea
            id="description"
            name="description"
            class="form-control"
            rows="3"
            placeholder="Enter description..."
            required minlength=35 maxlength=100>@if(old('description')){{old('description')}}@elseif(isset($post)){{$post->description}}@endif</textarea>
    <span id="description-feedback"></span>
</div>
<div class="form-group">
    <label for="content">
        <span class="capital-first-letter">content</span>
        <code><span class="capital-first-letter">required</span>. at least 100 characters</code>
    </label>
    <textarea
            id="content"
            name="content"
            class="form-control"
            rows="7"
            placeholder="Enter content..."
            required minlength=100>@if(old('content')){{old('content')}}@elseif(isset($post)){{$post->content}}@endif</textarea>
    <span id="content-feedback" class="help-block"></span>
</div>

<div class="form-group">
    <label for="category">
        <span class="capital-first-letter">category</span>
        <code><span class="capital-first-letter">required</span></code>
    </label>
    <select
            id="category"
            name="category_id"
            class="form-control"
            required>
        <option value="">Select a category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}"
            @if(old('category_id'))
                {{ old('category_id')==$category->id? 'selected':'' }}
                    @elseif(isset($post))
                {{ $post->category_id==$category->id? 'selected':'' }}
                    @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <span id="category-feedback" class="help-block"></span>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary capital-first-letter" id="submit-btn">ok</button>
    <button type="reset" value="Reset" class="btn btn-danger capital-first-letter">reset</button>
    <a class="btn btn-warning capital-first-letter" href="{{url("/admin/posts/")}}">cancel</a>
</div>

