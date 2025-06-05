@extends('admin.layout.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0">Order Details</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <a href="{{ route('admin.orders') }}"><button class="btn btn-brown">Back</button></a>
                </div>
            </div>
            <div class="card card-outline-brown">
                <div class="card-header">
                    <h5 class="m-0">Update Order Status</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" id="updateOrderStatusForm" data-id="{{ $order->order_id }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="order_status">Order Status</label>
                                    <select name="order_status" id="order_status" class="form-control form-select">
                                        <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="Process" {{ $order->order_status == 'Process' ? 'selected' : '' }}>
                                            Process</option>
                                        <option value="Dispatched"
                                            {{ $order->order_status == 'Dispatched' ? 'selected' : '' }}>Dispatched</option>
                                        <option value="Delivered"
                                            {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="Rejected" {{ $order->order_status == 'Rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="Canceled" {{ $order->order_status == 'Canceled' ? 'selected' : '' }}>
                                            Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="payment_status">Payment Status</label>
                                    <select name="payment_status" id="payment_status" class="form-control form-select">
                                        <option value="Pending" {{ $order->payment_status == 'Pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="Success"
                                            {{ $order->payment_status == 'Success' ? 'selected' : '' }}>
                                            Success</option>
                                        <option value="Failed" {{ $order->payment_status == 'Failed' ? 'selected' : '' }}>
                                            Failed</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="submit" id="updateBtn" class="btn bg-cream form-control" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="{{ url('public/assets/images/logo.png') }}" alt="Logo" width="180">
                                    <small class="float-right">
                                        Order Date:
                                        {{ $order->order_date_time ? date('d-M-Y | H:i A', strtotime($order->order_date_time)) : 'N/A' }}
                                    </small>
                                </h4>
                            </div>
                        </div>

                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Billing Address
                                <address>
                                    <strong class="text-capitalize">{{ $order->billing_name }}</strong><br>
                                    <span class="text-capitalize">{{ $order->billing_address }}</span> <br>
                                    Email: {{ $order->billing_email }} <br>
                                    Phone: {{ $order->billing_contact }}
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                Shipping Address
                                <address>
                                    <strong class="text-capitalize">{{ $order->shipping_address }}</strong><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Order ID:</b> {{ $order->order_id }}<br>
                                <b>Payment Status:</b> {{ $order->payment_status }}<br>
                                @if ($order->payment_status === 'paid')
                                    <b>Payment ID:</b> {{ $order->payment_id }}<br>
                                @endif
                                <b>Order Status:</b> {{ $order->order_status }}<br>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th width="200">Product ID</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                        @endphp

                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>{{ $item->product_id }}</td>
                                                <td>
                                                    <div class="product-image d-inline">
                                                        <img src="{{ url('') }}/{{ $item->product_image }}"
                                                            width="40">
                                                    </div>
                                                </td>
                                                <td>{{ $item->product_title }}</td>
                                                <td>₹{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>₹ {{ number_format($item->quantity * $item->price, 2) }}</td>
                                            </tr>
                                            @php
                                                $subtotal += $item->quantity * $item->price;
                                            @endphp
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <img src="{{ url('public/admin_assets/dist/img/credit/visa.png') }}" alt="Visa">
                                <img src="{{ url('public/admin_assets/dist/img/credit/mastercard.png') }}"
                                    alt="Mastercard">
                                <img src="{{ url('public/admin_assets/dist/img/credit/american-express.png') }}"
                                    alt="American Express">
                                <img src="{{ url('public/admin_assets/dist/img/credit/paypal2.png') }}" alt="Paypal">

                            </div>
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>₹ {{ number_format($subtotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>₹ {{ number_format($order->total_amount - $subtotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>₹ {{ number_format($order->total_amount, 2) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $("#updateOrderStatusForm").submit(function(e) {
            e.preventDefault();
            var form = $("#updateOrderStatusForm")[0];
            var data = new FormData(form);

            $.ajax({
                type: "POST",
                url: "{{ url('admin/updateOrderSatus') }}/" + $(this).attr('data-id'),
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
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
                        printError(data.error);
                    }
                },
                error: function(error) {
                    Swal.fire({
                        icon: data.status,
                        title: data.message
                    })
                    console.log(error.responseJSON);
                }
            });
        });

        function printError(err) {
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection
