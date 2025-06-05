@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Banners</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.addBanner') }}" class="float-right btn btn-brown mb-2"><i class="fas fa-add"></i>
                    Add Banner</a>
            </div>
        </div>
        <div class="card card-outline-brown">
            <div class="card-header bg-grey">
                <h5 class="mb-0 fw-bold">Banners</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="pb-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img src="{{ url($banner->banner_image) }}" style="height: 120px;" class="img-fluid">
                                </td>
                                <td>{{ $banner->banner_title }}</td>
                                <td>{{ $banner->banner_subtitle }}</td>
                                <td><a href="{{ $banner->banner_link }}"
                                        class="btn btn-sm btn-primary">{{ $banner->banner_button_text }}</a></td>
                                <td>
                                    @switch($banner->status)
                                        @case(1)
                                            Active
                                        @break

                                        @default
                                            Inactive
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('admin.editBanner', $banner->id) }}"
                                        class="btn btn-light text-primary border border-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="#" data-id="{{ $banner->id }}"
                                        class="btn btn-light text-danger border border-danger delete-btn"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card card-outline-brown">
            <div class="card-header bg-grey fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#trendBannerSection">Trend Banner</div>
            <div class="card-body collapse" id="trendBannerSection">
                <form action="" id="trendForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_subtitle">Heading</label>
                                <input type="text" name="banner_subtitle" value="{{ $trendBanner->banner_subtitle }}" class="form-control">
                                <div class="error banner_subtitle_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_title">Content</label>
                                <input type="text" name="banner_title" value="{{ $trendBanner->banner_title }}" class="form-control">
                                <div class="error banner_title_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_button_text">Button Text</label>
                                <input type="text" name="banner_button_text" value="{{ $trendBanner->banner_button_text }}" class="form-control">
                                <div class="error banner_button_text_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_link">Button Link</label>
                                <input type="text" name="banner_link" value="{{ $trendBanner->banner_link }}" class="form-control">
                                <div class="error banner_link_err"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Feature Image -->
                            <div class="form-group mb-3">
                                <label for="banner_image">Banner Image (Recommend: 704 X 688 Pixels)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" accept="image/*" id="banner_image"
                                        name="banner_image">
                                </div>
                                <div class="error banner_image_err"></div>
                                <div class="col-md-6 p-0" id="preview">
                                    <img src="{{ url($trendBanner->banner_image) }}" class="img-fluid mt-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-brown">Save Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-outline-brown">
            <div class="card-header bg-grey fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#hotBannerSection">Hot Banner</div>
            <div class="card-body collapse" id="hotBannerSection">
                <form action="" id="hotForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_subtitle1">Heading</label>
                                <input type="text" name="banner_subtitle1" value="{{ $hotBanner->banner_subtitle }}" class="form-control">
                                <div class="error banner_subtitle1_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_title1">Content</label>
                                <input type="text" name="banner_title1" value="{{ $hotBanner->banner_title }}" class="form-control">
                                <div class="error banner_title1_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_button_text1">Button Text</label>
                                <input type="text" name="banner_button_text1" value="{{ $hotBanner->banner_button_text }}" class="form-control">
                                <div class="error banner_button_text1_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_link1">Button Link</label>
                                <input type="text" name="banner_link1" value="{{ $hotBanner->banner_link }}" class="form-control">
                                <div class="error banner_link1_err"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Feature Image -->
                            <div class="form-group mb-3">
                                <label for="banner_image1">Banner Image (Recommend: 704 X 688 Pixels)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" accept="image/*" id="banner_image"
                                        name="banner_image1">
                                </div>
                                <div class="error banner_image1_err"></div>
                                <div class="col-md-6 p-0" id="preview">
                                    <img src="{{ url($hotBanner->banner_image) }}" class="img-fluid mt-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-brown">Save Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-outline-brown">
            <div class="card-header bg-grey fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#saleBannerSection">Sale Banner</div>
            <div class="card-body collapse" id="saleBannerSection">
                <form action="" id="saleForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_subtitle2">Heading</label>
                                <input type="text" name="banner_subtitle2" value="{{ $saleBanner->banner_subtitle }}" class="form-control">
                                <div class="error banner_subtitle2_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_title2">Content</label>
                                <input type="text" name="banner_title2" value="{{ $saleBanner->banner_title }}" class="form-control">
                                <div class="error banner_title2_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_button_text2">Button Text</label>
                                <input type="text" name="banner_button_text2" value="{{ $saleBanner->banner_button_text }}" class="form-control">
                                <div class="error banner_button_text2_err"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_link2">Button Link</label>
                                <input type="text" name="banner_link2" value="{{ $saleBanner->banner_link }}" class="form-control">
                                <div class="error banner_link2_err"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Feature Image -->
                            <div class="form-group mb-3">
                                <label for="banner_image2">Banner Image (Recommend: 704 X 688 Pixels)</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" accept="image/*" id="banner_image"
                                        name="banner_image2">
                                </div>
                                <div class="error banner_image1_err"></div>
                                <div class="col-md-6 p-0" id="preview">
                                    <img src="{{ url($saleBanner->banner_image) }}" class="img-fluid mt-3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-brown">Save Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        $(document).on('click', '.delete-btn', function() {
            var bannerId = $(this).data('id');
            var isConfirmed = confirm("Are you sure you want to delete this Banner?");
            if (isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/deleteBanner') }}/" + bannerId,
                    success: function(data) {
                        if (data.status == "success") {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                window.location.reload();
                            })
                        } else {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            } else {
                return false;
            }
        });
    

        $(document).ready(function() {
            $("#trendForm").submit(function(e) {
                e.preventDefault();
                var form = $("#trendForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.updateTrendBannerProcess') }}",
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


        $(document).ready(function() {
            $("#hotForm").submit(function(e) {
                e.preventDefault();
                var form = $("#hotForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.updateHotBannerProcess') }}",
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


        $(document).ready(function() {
            $("#saleForm").submit(function(e) {
                e.preventDefault();
                var form = $("#saleForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.updateSaleBannerProcess') }}",
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
