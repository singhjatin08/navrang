@extends('main.include.layout')
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
                        <!-- Free Shipping Goal Start-->
                        <div class="free-shipping-goal">
                            <div class="free-shipping-goal__label text-center">
                                Buy $3.03 more to enjoy
                                <strong>FREE Shipping</strong>
                            </div>
                            <div class="free-shipping-goal__loading-bar">
                                <div class="load-percent" style="width: 98.49%"></div>
                            </div>
                        </div>
                        <!-- Free Shipping Goal Start-->

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
                                    {{-- @foreach ($cartItems as $item)
                                        <tr class="cart-item">
                                            <td class="cart-product-remove">
                                                <a href="#" class="remove">×</a>
                                            </td>

                                            <td class="cart-product-thumbnail">
                                                <a href="product-single.html">
                                                    <img src="{{ $item->product_image }}" alt="Product" width="70"
                                                        height="89">
                                                </a>
                                            </td>

                                            <td class="cart-product-name">
                                                <a href="product-single.html">
                                                    {{ $item->product_title }}
                                                </a>
                                            </td>

                                            <td class="cart-product-price text-md-center" data-title="Price">
                                                <span class="price-amount">
                                                    <ins>₹<strike>{{ $item->product_price }}</strike>
                                                        {{ $item->product_sale_price }}</ins>
                                                </span>
                                            </td>

                                            <td class="cart-product-quantity text-md-center" data-title="Quantity">
                                                <div class="cart-table__quantity product-quantity">
                                                    <button type="button" class="decrease" aria-label="delete">
                                                        <i class="lastudioicon-i-delete-2"></i>
                                                    </button>
                                                    <input class="quantity-input" type="text"
                                                        value="{{ $item->quantity }}">
                                                    <button type="button" class="increase" aria-label="add">
                                                        <i class="lastudioicon-i-add-2"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td class="cart-product-subtotal text-md-center" data-title="Subtotal">
                                                <span class="price-amount">
                                                    $69.99
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach --}}
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
                                <a href="#">Proceed to checkout</a>
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

    <script>
        $(document).on('click', '.cart-product-remove .remove', function() {
            var product_id = $(this).data('product-id');
            if (product_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('deleteCart') }}" + product_id,
                    success: function(data) {
                        if (data.status == "success") {
                            loadCart() 
                        } else {
                            console.log("something went wrong!")
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

        function loadCart() {
            $.ajax({
                type: "GET",
                url: "{{ Route('getCart') }}",
                success: function(data) {
                    if (data.status) {
                        var table = $('#cartList');
                        var tableBody = table.find('tbody').html(''); // Clear table body
                        var totalAmount = 0; // Initialize total amount

                        data.data.forEach(function(product) {
                            console.log(product);
                            var subtotal = product.product_sale_price * product.quantity;
                            totalAmount += subtotal; // Add to total

                            var row = `
                            <tr class="cart-item">
                                <td class="cart-product-remove">
                                    <a data-product-id="${product.product_id}" href="#" class="remove">×</a>
                                </td>
    
                                <td class="cart-product-thumbnail">
                                    <a href="product-single.html">
                                        <img src="${product.product_image}" alt="Product" width="70" height="89">
                                    </a>
                                </td>
    
                                <td class="cart-product-name">
                                    <a href="product-single.html">${product.product_title}</a>
                                </td>
    
                                <td class="cart-product-price text-md-center" data-title="Price">
                                    <span class="price-amount">
                                        <ins>₹<strike>${product.product_price}</strike> ${product.product_sale_price}</ins>
                                    </span>
                                </td>
    
                                <td class="cart-product-quantity text-md-center" data-title="Quantity">
                                    <div class="cart-table__quantity product-quantity">
                                        <button type="button" class="decrease" aria-label="delete">
                                            <i class="lastudioicon-i-delete-2"></i>
                                        </button>
                                        <input class="quantity-input" type="text" value="${product.quantity}">
                                        <button type="button" class="increase" aria-label="add">
                                            <i class="lastudioicon-i-add-2"></i>
                                        </button>
                                    </div>
                                </td>
    
                                <td class="cart-product-subtotal text-md-center" data-title="Subtotal">
                                    <span class="price-amount">
                                        ₹${subtotal.toFixed(2)}
                                    </span>
                                </td>
                            </tr>
                            `;
                            tableBody.append(row);
                        });

                        // Calculate tax (example: 10% GST)
                        var taxAmount = totalAmount * 0.10;
                        var grandTotal = totalAmount + taxAmount;

                        // Update Cart Totals
                        $('.cart-totals__table').html(`
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td><span>₹ ${totalAmount.toFixed(2)}</span></td>
                                    </tr>
                                    <tr>
                                        <th>Taxes & GST (10%)</th>
                                        <td><span>₹ ${taxAmount.toFixed(2)}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><strong>₹ ${grandTotal.toFixed(2)}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        `);

                    } else {
                        $('#cartList tbody').html(
                            '<tr><td colspan="6" class="text-center">No products in the cart</td></tr>');
                        $('.cart-totals__table').html(`
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td><span>₹ 0.00</span></td>
                                    </tr>
                                    <tr>
                                        <th>Taxes & GST</th>
                                        <td><span>₹ 0.00</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><strong>₹ 0.00</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        `);
                    }
                },
                error: function() {
                    $('#cartList tbody').html(
                        '<tr><td colspan="6" class="text-center">Error loading cart</td></tr>');
                }
            });
        }

        loadCart();
    </script>
@endsection
