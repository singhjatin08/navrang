@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Orders</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card card-outline-brown">
            <div class="card-header bg-light">
                <h5 class="mb-0">Orders</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Product Image</th>
                            <th>Order ID</th>
                            <th>Username</th>
                            <th>Amount</th>
                            <th>Billing Address</th>
                            <th>Shipping Address</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    @foreach ($order->items as $item)
                                        <div class="product-image d-inline">
                                            <img src="{{ url('') }}/{{ $item->product_image }}">
                                        </div>
                                    @endforeach
                                </td>
                                <td><a href="{{ route('admin.order-details', $order->order_id) }}">{{ $order->order_id }}</a>
                                </td>
                                <td>{{ $order->username }}</td>
                                <td>₹ {{ $order->total_amount }}</td>
                                <td class="text-capitalize">{{ $order->billing_address }}</td>
                                <td class="text-capitalize">{{ $order->shipping_address }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td class="text-uppercase">{{ $order->order_date_time ? date('d-M-Y | H:i A', strtotime($order->order_date_time)) : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.order-details', $order->order_id) }}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
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
    </div>
@endsection
