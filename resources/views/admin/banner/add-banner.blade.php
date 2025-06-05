@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Add Banner</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data" id="addBannerForm">
            @csrf
            <div class="card card-outline-brown">
                <div class="card-header bg-grey">
                    <h5 class="mb-0">Add Banner</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="banner_subtitle"> Subtitle</label>
                        <input type="text" name="banner_subtitle" class="form-control">
                        <div class="error banner_subtitle_err"></div>
                    </div>
                    <div class="form-group">
                        <label for="banner_title"> Title</label>
                        <input type="text" name="banner_title" class="form-control">
                        <div class="error banner_title_err"></div>
                    </div>
                    <div class="form-group">
                        <label for="banner_link"> Link</label>
                        <input type="link" name="banner_link" class="form-control">
                        <div class="error banner_link_err"></div>
                    </div>
                    <div class="form-group">
                        <label for="banner_button_text"> Button Text</label>
                        <input type="link" name="banner_button_text" class="form-control">
                        <div class="error banner_button_text_err"></div>
                    </div>
                    <!-- Feature Image -->
                    <div class="form-group mb-3">
                        <label for="banner_image">Banner Image (Recommend: 1920 X 781 Pixels)</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept="image/*" id="banner_image"
                                name="banner_image">
                        </div>
                        <div class="error banner_image_err"></div>
                        <div class="col-md-6 p-0" id="preview"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <br>
                        <span class="d-inline-block mx-2"><input type="radio" name="status" value="1"
                                class="mr-2"> Active</span>
                        <span class="d-inline-block mx-2"><input type="radio" name="status" value="2"
                                class="mr-2"> Inactive</span>
                        <div class="error status_err"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="submitBtn" class="btn btn-brown float-right">Add Banner</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $("#addBannerForm").submit(function(e) {
                e.preventDefault();
                var form = $("#addBannerForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.addBannerProcess') }}",
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
                                window.location.href = "{{ Route('admin.banners') }}"
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
        $('#banner_image').on('change', function(event) {
            const file = event.target.files[0];
            const preview = $('#preview');
            preview.empty();
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = $('<img class="mt-3 img-fluid">').attr('src', e.target.result);
                    preview.append(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
