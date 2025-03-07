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
                    <div class="card-header">
                        <span class="m-0 fw-bold">Our Products</span>
                        <a href="{{url('admin/addProduct')}}"><button class="btn btn-primary float-right btn-sm"><i class="fa fa-plus"></i> Add Product</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Product ID</th>
                                    <th>Image</th>
                                    <th>Product Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($products as $product) {
                                ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>{{$product->product_id}}</td>
                                        <td class="p-1">
                                            <div class="product-image">
                                                <img src="{{url($product->product_image)}}">
                                            </div>
                                        </td>
                                        <td>{{$product->product_title}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td>₹ @if(!empty($product->product_sale_price))
                                            <span style="text-decoration: line-through;" class="text-danger">{{ $product->product_price }}</span>
                                            <span>{{ $product->product_sale_price }}</span>
                                            @else
                                            <span>{{ $product->product_price }}</span>
                                            @endif
                                        </td>
                                        <td>{{$product->created_at}}</td>
                                        <td>@if ($product->status == 1)
                                            Active
                                            @elseif ($product->status == 2)
                                            Draft 
                                            @else
                                            Inactive
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('admin/updateProduct')}}/{{$product->id}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{url('admin/deleteProduct')}}/{{$product->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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

@endsection