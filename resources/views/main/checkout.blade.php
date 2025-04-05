@extends('main.include.layout')
@section('content')
    <div>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">Checkout</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Checkout Start -->
        <div class="checkout-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Checkout Start -->
                <div class="checkout-wrapper">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <!-- Checkout Info Start -->
                            <div class="checkout-info">
                                <div class="checkout-info__title">
                                    {{-- <img src="assets/images/icon/coupon.svg" alt="Coupon" /> --}}
                                    Have a coupon?
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#coupon">
                                        Click here to enter your code
                                    </button>
                                </div>
                                <div class="collapse" id="coupon">
                                    <div class="checkout-info__body">
                                        <p>
                                            If you have a coupon code,
                                            please apply it below.
                                        </p>
                                        <form action="#">
                                            <div class="checkout-coupon-form single-form">
                                                <input class="single-form__input" type="text"
                                                    placeholder="Coupon code" />
                                                <button class="single-form__btn btn" class="single">
                                                    Apply coupon
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Info End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Checkout Info Start -->
                            <div class="checkout-info">
                                <div class="checkout-info__title">
                                    {{-- <i class="lastudioicon-single-01-2"></i> --}}
                                    Returning customer?
                                    <button type="button" data-bs-toggle="collapse" data-bs-target="#login">
                                        Click here to login
                                    </button>
                                </div>
                                <div class="collapse" id="login">
                                    <div class="checkout-info__body">
                                        <p>
                                            If you have shopped with us
                                            before, please enter your
                                            details below. If you are a new
                                            customer, please proceed to the
                                            Billing section.
                                        </p>
                                        <form action="#">
                                            <!-- Login Form End -->
                                            <div class="checkout-login-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="single-form">
                                                            <label class="single-form__label">Username or
                                                                email
                                                                *</label>
                                                            <input class="single-form__input" type="text"
                                                                placeholder="Coupon code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="single-form">
                                                            <label class="single-form__label">Password
                                                                *</label>
                                                            <input class="single-form__input" type="text"
                                                                placeholder="Coupon code" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <p>
                                                    Login with your Social
                                                    ID
                                                </p>
                                                <ul class="login-register__social">
                                                    <li>
                                                        <a class="social-facebook" href="#">
                                                            <span class="social-icon">
                                                                <img src="public/assets/images/facebook.svg"
                                                                    alt="Facebook" />
                                                            </span>
                                                            <span class="social-text">
                                                                Login with
                                                                Facebook
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="social-google" href="#">
                                                            <span class="social-icon">
                                                                <img src="public/assets/images/google.svg" alt="Facebook" />
                                                            </span>
                                                            <span class="social-text">
                                                                Login with
                                                                Google
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <!-- Single Form Start -->
                                                <div class="single-form">
                                                    <input class="single-form__input" type="checkbox" id="remember" />
                                                    <label for="remember"
                                                        class="single-form__label checkbox-label"><span></span>
                                                        Remember me</label>
                                                </div>
                                                <!-- Single Form Start -->
                                                <!-- Single Form Start -->
                                                <div class="single-form">
                                                    <button class="single-form__btn btn">
                                                        Log In
                                                    </button>
                                                </div>
                                                <!-- Single Form Start -->
                                            </div>
                                            <!-- Login Form End -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Info End -->
                        </div>
                    </div>

                    <form method="post" id="OrderProcessForm">
                        {{-- @csrf --}}
                        <div class="checkout-row">
                            <div class="checkout-col-1">
                                <!-- Checkout Details Start -->
                                <div class="checkout-details">
                                    <h3 class="checkout-details__title">
                                        Billing details
                                    </h3>

                                    <!-- Checkout Details Billing Start -->
                                    <div class="checkout-details__billing">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Name *</label>
                                            <input class="single-form__input" name="name" type="text" />
                                            <div class="error name_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Phone *</label>
                                            <input class="single-form__input" name="phone" type="text" />
                                            <div class="error phone_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Email address *</label>
                                            <input class="single-form__input" name="email" type="email" />
                                            <div class="error email_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Country / Region *</label>
                                            <select name="billing_country" class="single-form__select select2">
                                                <option selected value="India">
                                                    India
                                                </option>
                                            </select>
                                            <div class="error billing_country_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Street address *</label>
                                            <input class="single-form__input" name="billing_address" type="text"
                                                placeholder="House number, Apartment, suite, unit, etc." />
                                                <div class="error billing_address_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">State *</label>

                                            <select name="billing_state" class="single-form__select select2">
                                                <option value="">Select an option…</option>
                                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                <option value="Assam">Assam</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Chhattisgarh">Chhattisgarh</option>
                                                <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar
                                                    Haveli and Daman and Diu</option>
                                                <option value="Delhi">Delhi</option>
                                                <option value="Goa">Goa</option>
                                                <option value="Gujarat">Gujarat</option>
                                                <option value="Haryana">Haryana</option>
                                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                <option value="Jharkhand">Jharkhand</option>
                                                <option value="Karnataka">Karnataka</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                <option value="Maharashtra">Maharashtra</option>
                                                <option value="Manipur">Manipur</option>
                                                <option value="Meghalaya">Meghalaya</option>
                                                <option value="Mizoram">Mizoram</option>
                                                <option value="Nagaland">Nagaland</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Rajasthan">Rajasthan</option>
                                                <option value="Sikkim">Sikkim</option>
                                                <option value="Tamil Nadu">Tamil Nadu</option>
                                                <option value="Telangana">Telangana</option>
                                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                <option value="Uttarakhand">Uttarakhand</option>
                                                <option value="West Bengal">West Bengal</option>
                                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                </option>
                                                <option value="Chandigarh">Chandigarh</option>
                                                <option value="Lakshadweep">Lakshadweep</option>
                                                <option value="Puducherry">Puducherry</option>
                                            </select>
                                            <div class="error billing_state_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Postcode *</label>
                                            <input class="single-form__input" name="billing_postcode" type="text" />
                                            <div class="error billing_postcode_err"></div>
                                        </div>
                                        <!-- Single Form End -->
                                    </div>
                                    <!-- Checkout Details Billing End -->

                                    <!-- Checkout Details Shipping Start -->
                                    <div class="checkout-details__shipping">
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <input type="checkbox" value="Yes" name="different_shipping_address"
                                                id="shipping" class="shipping" />

                                            <label for="shipping" class="single-form__label checkbox-label"><span></span>
                                                Ship to a
                                                different address?</label>
                                        </div>
                                        <!-- Single Form End -->

                                        <div class="checkout-shipping">

                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Country / Region *</label>
                                                <select name="shipping_country"
                                                    class="single-form__select select2">
                                                    <option value="">
                                                        Select a country /
                                                        region…
                                                    </option>
                                                    <option selected value="India">
                                                        India
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- Single Form End -->
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Street address *</label>
                                                <input class="single-form__input" name="shipping_address" type="text"
                                                    placeholder="House number and street name" />
                                            </div>
                                            <!-- Single Form End -->
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">State *</label>
                                                <select name="shipping_state" class="single-form__select select2">
                                                    <option value="">
                                                        Select an option…
                                                    </option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and
                                                        Nagar Haveli and Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Odisha">Odisha</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                                    </option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Puducherry">Puducherry</option>
                                                </select>
                                            </div>
                                            <!-- Single Form End -->
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Postcode *</label>
                                                <input class="single-form__input" name="shipping_postcode"
                                                    type="text" />
                                            </div>
                                            <!-- Single Form End -->
                                        </div>
                                    </div>
                                    <!-- Checkout Details Shipping End -->

                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <label class="single-form__label">Order notes (optional)</label>
                                        <textarea name="order_note" class="single-form__input"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                    <!-- Single Form End -->
                                </div>
                                <!-- Checkout Details End -->
                            </div>
                            <div class="checkout-col-2">

                                <!-- Checkout Details Start -->
                                <div class="checkout-details">
                                    <h3 class="checkout-details__title">
                                        Your order
                                    </h3>

                                    <div class="checkout-details__order-review">
                                        <table class="table checkout-product-list">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">
                                                        Product
                                                    </th>
                                                    <th class="product-total">
                                                        Subtotal
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>

                                            <tfoot id="checkout-totals-table">
                                            </tfoot>
                                        </table>


                                        <div class="checkout-details__payment-method">
                                            <p><input type="radio" name="payment_method" value="Cash On Deliery"> Cash on Delivery</p>
                                            <p><input type="radio" name="payment_method" value="Bank Transfer"> Bank Transfer</p>
                                            <div class="error payment_method_err"></div>
                                        </div>

                                        <div class="checkout-details__privacy-policy">
                                            <p>
                                                Your personal data will be used
                                                to process your order, support
                                                your experience throughout this
                                                website, and for other purposes
                                                described in our privacy policy.
                                            </p>
                                        </div>

                                        <div class="checkout-details__btn">
                                            <button type="submit" id="submitBtn" class="btn">
                                                Place Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkout Details End -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Checkout End -->
            </div>
        </div>
        <!-- Checkout End -->

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
                            <input type="text" placeholder="Enter your email address..." />
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

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#OrderProcessForm").submit(function(e) {
            e.preventDefault();
            var form = $("#OrderProcessForm")[0];
            var data = new FormData(form);
            $("#submitBtn").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{ route('orderProcess') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    //alert(data.status);
                    console.log(data)
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        }).then(() => {
                            window.location.href = "{{ route('home') }}";
                        });
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

        function printError(err) {
            $('.error').text('');
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection
