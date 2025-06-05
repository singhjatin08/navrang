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
                    <form id="productForm">
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
                                        <input type="text" name="product_title" id="product_title" class="form-control">
                                        <div class="product_title_err error"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_category">Product Category</label>
                                        <select name="product_category" id="product_category"
                                            class="form-control form-select">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($categories as $category) {
                                            ?>
                                                <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="product_category_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price<span class="text-danger">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control">
                                        <div class="price_err error"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_discount_percentage">Product Discount Percentage</label>
                                        <input type="number" name="product_discount_percentage" id="product_discount_percentage" class="form-control" max="100" min="0" value="0">
                                        <div class="product_discount_percentage_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea id="short_description" name="short_description"
                                            class="form-control"></textarea>
                                        <div class="short_description_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control"></textarea>
                                        <div class="description_err error"></div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="seo_tags_and_scripts">SEO Tags & Scripts</label>
                                        <textarea name="seo_tags_and_scripts" rows="6" class="form-control"></textarea>
                                        <div class="seo_tags_and_scripts_err error"></div>
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
                                            <div class="product-image-box" id="product-image-box"></div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product_gallery">Product Gallery</label>
                                                <input type="file" class="form-control" id="product_gallery"
                                                    name="product_gallery[]" multiple>
                                                <div class="product_gallery_err error"></div>
                                            </div>
                                            <div class="product-image-box" id="product-gallery-box"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="feature_product">Feature Product</label><br>
                                        <span class="mx-2">
                                            <input type="radio" name="feature_product" value="Yes"> Yes
                                        </span>
                                        <span class="mx-2">
                                            <input type="radio" checked name="feature_product" value=""> No
                                        </span>
                                        <div class="error feature_product_err"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="stock">In Stock</label>
                                            <br>
                                            <span class="d-inline-block mx-2">
                                                <input type="radio" checked name="stock" value="1" class="mr-2"> Yes
                                            </span>
                                            <span class="d-inline-block mx-2">
                                                <input type="radio" name="stock" value="0" class="mr-2"> No
                                            </span>
                                            <div class="error status_err"></div>
                                        </div>
                                    </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select Status</option>
                                            <option value="2">Draft</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <div class="status_err error"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer">
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
            $("#submitBtn").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{Route('admin.addProductProcess')}}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        }).then(() => {
                            window.location.href = "{{Route('admin.products')}}"
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


    document.getElementById("product_image").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const imageBox = document.getElementById("product-image-box");

        // Clear any existing previews
        imageBox.innerHTML = "";

        if (file) {
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            img.classList.add("img-fluid", "preview-image");
            imageBox.appendChild(img);
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
</script>

@endsection