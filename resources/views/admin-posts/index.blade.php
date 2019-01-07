@extends('layouts.admin')
@section('heading')
    <span class="capital-first-letter">posts</span>
@endsection
@section('content')
    <div id="status">
        <div class="alert alert-dismissible status" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <span id="status-title"></span></h4>
            <p id="status-message">message</p>
        </div>
    </div>
    <p>
        <a
                href="{{ url("/admin/posts/create") }}"
                class="btn  btn-primary text-center">
            <span class="capital-first-letter">add</span> new post</a>
    </p>
    <table class="table table-hover table-bordered break-word">
        <thead>
        <tr>
            <th scope="col" class="capital-first-letter">title</th>
            <th scope="col" class="capital-first-letter" width="10%">actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr data-post="{{$post->id}}">
                <td scope="row"><a href="{{ $post->path()}}">{{$post->title}}</a></td>
                <td>
                    <a href="{{ url("/admin".$post-> path()."/edit") }}"
                       class="btn btn-info">
                        <i class="fa fa-edit"></i>
                    </a>


                    <button
                            type="button"
                            class="btn btn-danger delete"
                            data-toggle="modal"
                            data-target="#modal-danger"
                            data-id="{{$post->id}}"
                            data-title="{{$post->title}}">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Start Pagination -->
    <div aria-label="Page navigation" class="text-center">
        {{ $posts->links() }}
    </div>
    <!-- End Pagination -->



    <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Confirm delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete "<span id="delete-title"></span>" ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" id="cancel-delete-btn">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-outline" id="confirm-delete-btn">Delete</button>
                </div>
            </div>

        </div>

    </div>

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            let deteleBtns = document.getElementsByClassName("delete");
            let myFunction = function () {
                let postId = this.getAttribute("data-id");
                let postTitle = this.getAttribute("data-title");
                let deletedElementTitle = document.getElementById("delete-title");
                deletedElementTitle.innerHTML = postTitle;
                deletedElementTitle.setAttribute("data-id", postId);
            };

            for (let i = 0; i < deteleBtns.length; i++)
            {
                deteleBtns[i].addEventListener('click', myFunction, false);
            }

            let confirmDeleteBtn = document.getElementById("confirm-delete-btn");
            confirmDeleteBtn.addEventListener('click', function () {
                let id = document.getElementById("delete-title").getAttribute("data-id");
                $.ajax({
                    url: `/admin/posts/${id}`,
                    type: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        '_method': 'DELETE'
                    },
                    success: res => {
                        let row = $('tr[data-post="' + id + '"]');
                        let status = document.getElementById("status");
                        row.remove();
                        document.getElementById("status-title").innerHTML = "Delete status";
                        document.getElementById("status-message").innerHTML = res.message;
                        let alert = document.getElementsByClassName("status")[0].cloneNode(true);
                        alert.style.display = "block";
                        alert.classList.add("alert-success");
                        status.appendChild(alert);
                        //close the pop up
                        document.getElementById("cancel-delete-btn").click();
                    }
                });


            }, false);
        });


    </script>

@endsection
