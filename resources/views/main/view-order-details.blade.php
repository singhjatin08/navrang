@extends('main.include.layout')
@section('content')
    <div class="bg-light">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section"
            style="background-image: url({{ url('public/assets/images/blog-page-header.jpg') }});">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper breadcrumb-white text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Order Details
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Order Details</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <section class="content section-padding-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice p-3 mb-3">
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
                                                        <a href="{{ route('product-details', $item->product_id) }}">
                                                            <div class="product-image d-inline">
                                                                <img src="{{ url('') }}/{{ $item->product_image }}"
                                                                    width="40">
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('product-details', $item->product_id) }}">
                                                            {{ $item->product_title }}
                                                        </a>
                                                    </td>
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
    </div>
@endsection
