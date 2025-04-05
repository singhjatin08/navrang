@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Blog</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="" method="post" id="addBlogForm" enctype="multipart/form-data">
            @csrf
            <div class="card card-outline-brown">
                <div class="card-header bg-cream">
                    Add Blogs
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="slug">Slug</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-link"></i></span>
                            </div>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div>
                        <div class="error slug_err"></div>
                    </div>
                    <!-- Blog Title -->
                    <div class="form-group mb-3">
                        <label for="title">Blog Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="error title_err"></div>
                    </div>

                    <!-- short Description -->
                    <div class="form-group mb-3">
                        <label for="short_description">Short Description</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-book"></i></span>
                            </div>
                            <input type="text" name="short_description" class="form-control">
                        </div>
                        <div class="error short_description_err"></div>
                    </div>

                    <!-- Blog Description -->
                    <div class="form-group mb-3">
                        <label for="description">Blog Description</label>
                        <textarea id="description" name="description" class="form-control w-100"></textarea>
                        <div class="error description_err"></div>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label for="category">Service Category</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            </div>
                            <select name="category" id="category" class="form-control form-select">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="error category_err"></div>
                    </div>

                    <!-- Tags -->
                    <div class="form-group mb-3">
                        <label for="tags">Tags</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                            </div>
                            <input type="text" name="tags" id="tags" class="form-control">
                        </div>
                        <div class="error tags_err"></div>
                    </div>

                    <!-- Feature Image -->
                    <div class="form-group mb-3">
                        <label for="feature_image">Feature Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept="image/*" id="feature_image"
                                name="feature_image">
                        </div>
                        <div class="error feature_image_err"></div>
                        <div class="col-md-6 p-0" id="preview"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <br>
                        <span class="d-inline-block mx-2"><input type="radio" name="status" value="3"
                                class="mr-2"> Draft</span>
                        <span class="d-inline-block mx-2"><input type="radio" name="status" value="1"
                                class="mr-2"> Active</span>
                        <span class="d-inline-block mx-2"><input type="radio" name="status" value="2"
                                class="mr-2"> Inactive</span>
                        <div class="error status_err"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-brown float-right">Submit Blog</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#addBlogForm").submit(function(e) {
                e.preventDefault();
                var form = $("#addBlogForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.blogs.add') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data)
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                window.location.href = "{{ Route('admin.blogs') }}"
                            })
                        } else {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                            printError(data.error)
                        }
                        $("#submitBtn").prop("disabled", false);
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                        $("#submitBtn").prop("disabled", false);
                    }
                })
            })
        })



        function printError(err) {
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }


        // Preview for feature image
        $('#feature_image').on('change', function(event) {
            const file = event.target.files[0];
            const preview = $('#preview');
            preview.empty();
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = $('<img class="mt-3" height="150">').attr('src', e.target.result);
                    preview.append(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $(document).on("keyup", "input[name='title']", function() {
            var value = $(this).val();
            var outString = value.trim().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-').toLowerCase();
            $(this).closest("form").find("input[name='slug']").val(outString);
        })
    </script>
@endsection
