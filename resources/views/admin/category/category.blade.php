@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Category</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    @if (session('message'))
                        <div class="alert alert-{{ session('message_class') }}">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div id="success-alert" class="alert alert-success" style="display: none;">
                        Category Added Successfully!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <!-- Add Category Form -->
                        <form id="addCategoryForm">
                            @csrf
                            <div class="card-header">
                                <p class="m-0 fw-bold">Add Category</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="category_name" id="category_name"
                                                class="form-control">
                                            <div class="category_name_err error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control slug">
                                            <div class="slug_err error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="parent_category">Parent Category</label>
                                            <select name="parent_category" id="parent_category"
                                                class="form-control form-select">
                                                <option value="">Select Parent Category</option>
                                            </select>
                                            <div class="parent_category_err error"></div>
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
                                <button type="submit" class="btn btn-primary px-4 bg-indigo float-right">Submit</button>
                            </div>
                        </form>

                        <!-- Update Category Form -->
                        <form id="updateCategoryForm">
                            @csrf
                            <div class="card-header">
                                <p class="m-0 fw-bold">Update Category</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Category Name</label>
                                            <input type="text" name="category_name" class="form-control category_name">
                                            <div class="category_name_err error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control slug">
                                            <div class="slug_err error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="parent_category">Parent Category</label>
                                            <select name="parent_category" class="form-control form-select parent_category">
                                                <option value="">Select Parent Category</option>
                                            </select>
                                            <div class="parent_category_err error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control form-select status">
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
                                <input type="hidden" name="category_id" class="category_id" value="">
                                <button type="submit" class="btn btn-primary px-4 bg-indigo float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <p class="m-0 fw-bold">Category List</p>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered categoryList">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Parent Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("keyup", "input[name='category_name']", function() {
            var value = $(this).val();
            var outString = value.trim().replace(/[^\w\s]/gi, '').replace(/\s+/g, '-').toLowerCase();

            // Find the closest slug input in the same form
            $(this).closest("form").find("input[name='slug']").val(outString);
        });


        $(document).ready(function() {
            // Hide the update form initially
            $("#updateCategoryForm").hide();
            $("#addCategoryForm").show();

            // Submit form for adding category
            $("#addCategoryForm").submit(function(e) {
                e.preventDefault();
                var form = $("#addCategoryForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ Route('admin.addCategoryProcess') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                            form.reset();
                            loadCategories();
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

            // Edit button click
            $(document).on('click', '.edit-btn', function() {
                var categoryId = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/editCategory') }}/" + categoryId,
                    success: function(data) {
                        // Show update form and hide add form
                        $("#updateCategoryForm").show();
                        $("#addCategoryForm").hide();

                        // Prefill the form with the category data
                        $("#updateCategoryForm .category_name").val(data.category_name);
                        $("#updateCategoryForm .slug").val(data.slug);
                        $("#updateCategoryForm .parent_category").val(data.parent_id).trigger(
                            'change');
                        $("#updateCategoryForm .status").val(data.status);
                        $("#updateCategoryForm .category_id").val(data.id);
                        $("#updateCategoryForm").attr('data-id', data.id);
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            });

            // Submit form for updating category
            $("#updateCategoryForm").submit(function(e) {
                e.preventDefault();
                var form = $("#updateCategoryForm")[0];
                var data = new FormData(form);

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/updateCategory') }}/" + $(this).attr('data-id'),
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                            loadCategories();
                            // Hide update form and show add form again
                            $("#updateCategoryForm").hide();
                            $("#addCategoryForm").show();
                        } else {
                            printError(data.error);
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON);
                    }
                });
            });

            $(document).on('click', '.delete-btn', function() {
                var categoryId = $(this).data('id');
                var isConfirmed = confirm("Are you sure you want to delete this Category?");
                if (isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/deleteCategory') }}/" + categoryId,
                        success: function(data) {
                            if (data.status == "success") {
                                loadCategories()
                                Swal.fire({
                                    icon: data.status,
                                    title: data.message
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

            function loadCategories() {
                $.ajax({
                    type: "GET",
                    url: "{{ Route('admin.getAllCategory') }}",
                    success: function(data) {
                        var select = $('#parent_category');
                        var selectUpdate = $('.parent_category');
                        select.html('<option value="">Select Parent Category</option>');
                        selectUpdate.html('<option value="">Select Parent Category</option>');
                        data.forEach(function(category) {
                            select.append(
                                `<option value="${category.id}">${category.category_name}</option>`
                            );
                            selectUpdate.append(
                                `<option value="${category.id}">${category.category_name}</option>`
                            );
                        });

                        var table = $('.categoryList');
                        var tableBody = table.find('tbody').html('');
                        data.forEach(function(category, index) {
                            var row = `<tr>
                                                                <td>${index + 1}</td>
                                                                <td>${category.category_name}</td>
                                                                <td>${category.slug}</td>
                                                                <td>${category.parent_id ? category.parent_name : 'N/A'}</td>
                                                                <td>${category.status === '1' ? 'Active' : category.status === '2' ? 'Draft' : category.status === '0' ? 'Inactive' : 'N/A'}</td>
                                                                <td>
                                                                    <button class="btn btn-primary btn-sm border edit-btn" data-id="${category.id}">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                    <button data-id="${category.id}" class="btn btn-danger btn-sm delete-btn">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>`;
                            tableBody.append(row);
                        });
                        table.DataTable();
                    }
                });
            }


            loadCategories();
        });

        function printError(err) {
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection
