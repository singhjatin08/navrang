@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>My Account - Navrangaroma Candles</title>
@endsection
@section('content')

    <div style="margin-top: 145px;">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">My Account</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>My Account</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        @if (Session::has('user'))
            <!-- My Account Start -->
            <div class="my-account-section section-padding-2">
                <div class="container-fluid custom-container">
                    <!-- My Account Tabs Start -->
                    <div class="my-account-tab">
                        <!-- My Account Tabs Menu Start -->
                        <div class="my-account-tab__menu">
                            <ul class="nav justify-content-center" role="tablist">
                                <li>
                                    <button class="account-btn active" data-bs-toggle="tab" data-bs-target="#dashboard"
                                        type="button" aria-selected="true" role="tab">
                                        Dashboard
                                    </button>
                                </li>
                                <li>
                                    <button class="account-btn" data-bs-toggle="tab" data-bs-target="#orders" type="button"
                                        aria-selected="false" tabindex="-1" role="tab">
                                        Orders
                                    </button>
                                </li>
                                <li>
                                    <a class="account-btn" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </div>
                        <!-- My Account Tabs Menu End -->

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                                <!-- My Account Dashboard Start -->
                                <div class="my-account-dashboard">
                                    <p>
                                        Hello <strong>{{ Session::get('user')->name }}</strong> (not
                                        <strong>{{ Session::get('user')->username }}</strong>?
                                        <a href="{{ route('logout') }}">Log out</a>)
                                    </p>
                                    {{-- <p>
                                        From your account dashboard you can view
                                        your <a href="#">recent orders</a>,
                                        manage your
                                        <a href="#">shipping and billing addresses</a>, and
                                        <a href="#">edit your password and account
                                            details</a>.
                                    </p> --}}

                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ Session::get('user')->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ Session::get('user')->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ Session::get('user')->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>{{ Session::get('user')->username }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- My Account Dashboard End -->
                            </div>
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <!-- My Account Orders Start -->
                                <div class="my-account-orders">
                                    <div class="my-account-table table-responsive">
                                        {{-- {{ $orders }} --}}
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <span>Order</span>
                                                    </th>
                                                    <th>
                                                        <span>Image</span>
                                                    </th>
                                                    <th>
                                                        <span>Date</span>
                                                    </th>
                                                    <th>
                                                        <span>Status</span>
                                                    </th>
                                                    <th>
                                                        <span>Total</span>
                                                    </th>
                                                    <th>
                                                        <span>Actions</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <a href="#"> {{ $order->order_id }} </a>
                                                        </td>
                                                        <td>
                                                            @foreach ($order->items as $item)
                                                                <span>
                                                                    <img src="{{ url($item->product_image) }}" width="40"
                                                                        alt="Product Image">
                                                                </span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <time>
                                                                {{ $order->order_date_time ? date('d-M-Y | H:i A', strtotime($order->order_date_time)) : 'N/A' }}
                                                            </time>
                                                        </td>
                                                        <td>
                                                            {{ $order->payment_status }}
                                                        </td>
                                                        <td>
                                                            <span>₹ {{ $order->total_amount }}</span>
                                                            for {{ count($order->items) }} items
                                                        </td>
                                                        <td>
                                                            <a class="btn" href="{{ route('view-order', $order->order_id) }}">
                                                                View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- My Account Orders End -->
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel">
                                <!-- My Account Account Detail Start -->
                                <div class="my-account-detail">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Single Form Start -->
                                                <div class="single-form">
                                                    <label class="single-form__label">First name *</label>
                                                    <input class="single-form__input" type="text">
                                                </div>
                                                <!-- Single Form Start -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Single Form Start -->
                                                <div class="single-form">
                                                    <label class="single-form__label">Last name *</label>
                                                    <input class="single-form__input" type="text">
                                                </div>
                                                <!-- Single Form Start -->
                                            </div>
                                        </div>
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Display name *</label>
                                            <input class="single-form__input" type="text">
                                        </div>
                                        <!-- Single Form Start -->

                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Email address *</label>
                                            <input class="single-form__input" type="email">
                                        </div>
                                        <!-- Single Form Start -->

                                        <p class="my-account-detail__legend">
                                            Password change
                                        </p>

                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Current password (leave blank
                                                to leave unchanged)</label>
                                            <input class="single-form__input" type="password">
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">New password (leave blank to
                                                leave unchanged)</label>
                                            <input class="single-form__input" type="password">
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Confirm new password</label>
                                            <input class="single-form__input" type="password">
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <button class="single-form__btn btn">
                                                Save Change
                                            </button>
                                        </div>
                                        <!-- Single Form Start -->
                                    </form>
                                </div>
                                <!-- My Account Account Detail End -->
                            </div>
                        </div>
                    </div>
                    <!-- My Account Tabs End -->
                </div>
            </div>
            <!-- My Account End -->
        @else
            <!-- My Account Start -->
            <div class="my-account-section section-padding-2">
                <div class="container-fluid custom-container">
                    <div class="my-account-tab">
                        <p class="text-center mb-3">Please login now to see your Order History.</p>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn-theme-1">Login</a>
                            <a href="{{ route('signup') }}" class="btn-theme-1">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- My Account End -->
        @endif





        <!-- Newsletter Start -->
        <!-- Newsletter Start -->
        <div class="newsletter-section">
            <div class="newsletter-left" style="background-image: url(public/assets/images/newsletter-bg-1.jpg)">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">Follow us on</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>

                    <div class="newsletter-social">
                        <ul class="newsletter-social__list">
                            <li>
                                <a href="#" aria-label="facebook">
                                    <i class="lastudioicon-b-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="twitter">
                                    <i class="lastudioicon-b-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="instagram">
                                    <i class="lastudioicon-b-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="vimeo">
                                    <i class="lastudioicon-b-vimeo"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="envato">
                                    <i class="lastudioicon-envato"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
            <div class="newsletter-right" style="background-image: url(public/assets/images/newsletter-bg-2.jpg)">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>
                    <form action="#">
                        <div class="newsletter-form-style-1">
                            <input type="text" placeholder="Enter your email address...">
                            <button>Subscribe</button>
                        </div>
                    </form>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
        </div>
        <!-- Newsletter End -->

        <!-- Newsletter End -->
    </div>

@endsection