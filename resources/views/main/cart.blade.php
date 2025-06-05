@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>Cart - Navrangaroma Candles</title>
@endsection
@section('content')
    <div style="margin-top: 145px;">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">Cart</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Cart Start -->
        <div class="cart-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Cart Wrapper Start-->
                <div class="cart-wrapper">
                    <!-- Cart Form Start-->
                    <div class="cart-form">

                        <!-- Cart Table Start-->
                        <div class="cart-table table-responsive">
                            <table class="table" id="cartList">
                                <thead>
                                    <tr>
                                        <th class="cart-product-remove">
                                            &nbsp;
                                        </th>
                                        <th class="cart-product-thumbnail">
                                            &nbsp;
                                        </th>
                                        <th class="cart-product-name">
                                            Product
                                        </th>
                                        <th class="cart-product-price text-center">
                                            Price
                                        </th>
                                        <th class="cart-product-quantity text-center">
                                            Quantity
                                        </th>
                                        <th class="cart-product-subtotal text-center">
                                            Subtotal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Table Start-->
                    </div>
                    <!-- Cart Form End-->

                    <!-- Cart Collaterals Start-->
                    <div class="cart-collaterals">
                        <!-- Cart Totals Start-->
                        <div class="cart-totals">
                            <h3 class="cart-totals__title">Cart totals</h3>

                            <div class="cart-totals__table table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>
                                                <span>₹ 196.97</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Taxes & GST</th>
                                            <td>
                                                <span>₹ 50</span>
                                            </td>
                                        </tr>


                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong>$216.97</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-totals__checkout">
                                <a href="{{route('checkout')}}">Proceed to checkout</a>
                            </div>
                        </div>
                        <!-- Cart Totals End-->
                    </div>
                    <!-- Cart Collaterals End-->
                </div>
                <!-- Cart Wrapper End -->
            </div>
        </div>
        <!-- Cart End -->

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
                    <form action="#" class="subscribeForm">
                        <div class="newsletter-form-style-1">
                            <input type="text" placeholder="Enter your email address..." />
                            <button>Subscribe</button>
                        </div>
                    </form>
                    <div class="error email_err"></div>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
        </div>
        <!-- Newsletter End -->

        <!-- Newsletter End -->
    </div>


@endsection