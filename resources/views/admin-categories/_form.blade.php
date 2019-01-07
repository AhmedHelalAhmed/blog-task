<div class="form-group">
    <label for="category-name">
        <span class="capital-first-letter">name</span>
        <code><span class="capital-first-letter">required</span>. at least 3 characters</code>
    </label>
    <input
            id="category-name"
            value="@if(old('name')){{old('name')}}@elseif(isset($category)){{$category->name}}@endif"
            name="name"
            type="text"
            class="form-control"
            placeholder="Enter name..."
            required  minlength=3 />

    <span id="category-name-feedback" class="help-block"></span>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary capital-first-letter" id="submit-btn-category">ok</button>
    <button type="reset" value="Reset" class="btn btn-danger capital-first-letter">reset</button>
    <a class="btn btn-warning capital-first-letter" href="{{url("/admin/categories/")}}">cancel</a>
</div>

