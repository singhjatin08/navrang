@extends('admin.layout.layout')
@section('content')
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
                        <div class="card-header">
                            <span class="m-0 fw-bold">Our Products</span>
                            <a href="{{ url('admin/addProduct') }}"><button class="btn btn-primary float-right btn-sm"><i
                                        class="fa fa-plus"></i> Add Product</button></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered dataTable text-xs">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Product ID</th>
                                        <th>Image</th>
                                        <th>Product Title</th>
                                        <th>Category</th>
                                        <th width="140">Price</th>
                                        <th>Created_On</th>
                                        <th>Featured</th>
                                        <th>Status</th>
                                        <th width="150">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $i = 1;
                                foreach ($products as $product) {
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <a href="{{ url('product-details') }}/{{ $product->product_id }}">
                                                {{ $product->product_id }}
                                            </a>
                                        </td>
                                        <td class="p-1">
                                            <div class="product-image">
                                                <img src="{{ url($product->product_image) }}">
                                            </div>
                                        </td>
                                        <td>{{ $product->product_title }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>
                                            ₹
                                            @if (is_numeric($product->product_price) && is_numeric($product->product_discount_percentage))
                                                <span style="text-decoration: line-through;" class="text-danger">{{ $product->product_price }}</span>
                                                <span>{{ $product->product_price - ($product->product_price / 100 * $product->product_discount_percentage) }}</span>
                                            @else
                                                <span>{{ $product->product_price }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>@if ($product->feature_product == 'Yes')
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == 1)
                                                Active
                                            @elseif ($product->status == 2)
                                                Draft
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('product-details') }}/{{ $product->product_id }}"
                                                target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                                            <a href="{{ url('admin/updateProduct') }}/{{ $product->id }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button data-id="{{ $product->id }}" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.delete-btn', function() {
                var proID = $(this).data('id');
                var isConfirmed = confirm("Are you sure you want to delete this Product?");
                if (isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('admin/deleteProduct') }}/" + proID,
                        success: function(data) {
                            if (data.status == "success") {
                                Swal.fire({
                                    icon: data.status,
                                    title: data.message
                                }).then(() => {
                                    location.reload();
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
