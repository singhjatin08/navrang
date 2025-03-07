@extends("admin.layout.layout")
@section("content")

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Products</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="productForm" method="post" enctype="multipart/form-data">
                        <div class="card-header">
                            <span class="m-0 fw-bold">Add Product</span>
                        </div>
                        <div class="card-body">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_title">Product Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="product_title" id="product_title" class="form-control"
                                            value="{{ $product->product_title }}">
                                        <div class="product_title_err error"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_category">Product Category</label>
                                        <select name="product_category" id="product_category"
                                            class="form-control form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}" {{ $product->product_category == $category['id'] ? 'selected' : '' }}>
                                                {{ $category['category_name'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="product_category_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price<span class="text-danger">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            value="{{ $product->product_price }}">
                                        <div class="price_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="text" name="sale_price" id="sale_price" class="form-control"
                                            value="{{ $product->product_sale_price }}">
                                        <div class="sale_price_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea id="short_description" name="short_description"
                                            class="form-control">{{ $product->product_short_description }}</textarea>
                                        <div class="short_description_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description"
                                            class="form-control">{{ $product->product_description }}</textarea>
                                        <div class="description_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row mt-3 mb-3 bg-light py-3 border border-grey">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product_image">Product Image<span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="product_image"
                                                    name="product_image">
                                                <div class="product_image_err error"></div>
                                            </div>
                                            <div class="product-image-box" id="product-image-box">
                                                <img src="{{ url($product->product_image) }}" class="image-preview">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product_gallery">Product Gallery</label>
                                                <input type="file" class="form-control" id="product_gallery"
                                                    name="product_gallery[]" multiple>
                                                <div class="product_gallery_err error"></div>
                                            </div>
                                            <div class="product-image-box" id="product-gallery-box">
                                                <?php
                                                foreach ($product->product_gallery as $img) {
                                                ?>
                                                    <span class="preview-image m-1">
                                                        <img src="{{url($img->file_path)}}">
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                            data-image-id="{{$img->id}}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </span>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select Status</option>
                                            <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Draft</option>
                                            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        <div class="status_err error"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="pID" id="pID" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary float-right" id="submitBtn">Add
                                Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#productForm").submit(function(e) {
            e.preventDefault();
            var form = $("#productForm")[0];
            var data = new FormData(form);
            var productId = $("#pID").val();
            $("#submitBtn").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/updateProductProcess') }}/" + productId,
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        })
                        printError(data.error);
                    }
                    $("#submitBtn").prop("disabled", false);
                },
                error: function(error) {
                    console.log(error.responseJSON);
                    $("#submitBtn").prop("disabled", false);
                }
            });
        });

        // Image Preview for product image
        $("#product_image").change(function(e) {
            const file = e.target.files[0];
            const imageBox = $("#product-image-box");
            imageBox.empty(); // Clear any existing previews

            if (file) {
                const img = document.createElement("img");
                img.src = URL.createObjectURL(file);
                img.classList.add("img-fluid", "preview-image");
                imageBox.append(img);
            }
        });

        $("#product_gallery").change(function(e) {
            const dt = new DataTransfer();
            const galleryBox = $("#product-gallery-box");

            Array.from(e.target.files).forEach((file, i) => {
                const imgContainer = $(`<div class="preview-image">
            <img src="${URL.createObjectURL(file)}" class="img-fluid">
            <button class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-selected-image" data-index="${i}">
                <i class="fa fa-trash"></i>
            </button>
        </div>`);
                galleryBox.append(imgContainer);
                dt.items.add(file);
            });

            e.target.files = dt.files;
        });

        $(document).on("click", ".remove-selected-image", function() {
            const index = $(this).data("index");
            const input = document.getElementById("product_gallery");
            const dt = new DataTransfer();

            Array.from(input.files).forEach((file, i) => i !== index && dt.items.add(file));

            input.files = dt.files;
            $(this).closest(".preview-image").remove();
        });
    });

    function printError(err) {
        $.each(err, function(key, value) {
            $("." + key + "_err").text(value);
        });
    }
    $(document).on('click', '#product-gallery-box .delete-btn', function() {
        var gId = $(this).data('image-id');
        console.log(gId)
        var isConfirmed = confirm("Are you sure you want to delete this Image?");
        if (isConfirmed) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/deleteGalleryImage')}}/" + gId,
                success: function(data) {
                    if (data.status == "success") {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        }).then(() => {
                            window.location.reload();
                        });

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
</script>

@endsection