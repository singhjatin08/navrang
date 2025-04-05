@extends('main/include/layout')
@section('content')
    <div>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Shop
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Shop Start -->
        <div class="shop-section section-padding-2">
            <div class="container-fluid custom-container">

                <!-- Shop Wrapper Start -->
                <div class="shop-wrapper">
                    <div class="row">
                        
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="javascript:void(0);" onclick="" data-bs-tooltip="tooltip"
                                                data-bs-placement="top" data-bs-title="Add to wishlist"
                                                data-bs-custom-class="p-meta-tooltip" aria-label="wishlist"
                                                id="wishlist-btn-{{ $product->id }}">
                                                <i class="lastudioicon-heart-2"></i>
                                            </a>
                                        </div>
                                        @if (!empty($product->product_sale_price))
                                            <div class="single-product__thumbnail--badge onsale">
                                                Sale
                                            </div>
                                        @endif


                                        <div class="single-product__thumbnail--holder">
                                            <a href="{{ route('product-details', $product->product_id) }}">
                                                <img src="{{ url('') }}/{{ $product->product_image }}" alt="Product"
                                                    width="344" height="370" />
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-product-id="{{ $product->product_id }}"
                                                class="add-to-cart">
                                                <i class="lastudioicon-shopping-cart-3"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">{{ $product->category_name }}</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="{{ route('product-details', $product->product_id) }}">
                                                {{ $product->product_title }}
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            @if (!is_null($product->product_sale_price) && $product->product_sale_price != '')
                                                <del>₹ {{ $product->product_price }}</del>
                                                <ins>₹ {{ $product->product_sale_price }}</ins>
                                            @else
                                                <ins>₹ {{ $product->product_price }}</ins>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Shop Wrapper End -->

                <!-- Product More Start -->
                <!-- Pagination -->
                @if ($products->hasPages())
                    <div class="paginations">
                        <ul class="paginations-list-2">
                            <!-- Previous Page -->
                            <li>
                                <a href="{{ $products->previousPageUrl() }}"
                                    class="{{ $products->onFirstPage() ? 'disabled' : '' }}">
                                    <i class="lastudioicon-arrow-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            @foreach ($products->links()->elements[0] as $page => $url)
                                <li>
                                    <a href="{{ $url }}"
                                        class="{{ $page == $products->currentPage() ? 'active' : '' }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            <!-- Next Page -->
                            <li>
                                <a href="{{ $products->nextPageUrl() }}"
                                    class="{{ $products->hasMorePages() ? '' : 'disabled' }}">
                                    <i class="lastudioicon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <!-- Blog End -->
        <!-- Product More End -->
    </div>
    </div>
    <!-- Shop End -->

    <!-- Newsletter Start -->
    <div class="newsletter-section">
        <div class="newsletter-left"
            style="
                        background-image: url(public/assets/images/newsletter-bg-1.jpg);
                    ">
            <div class="newsletter-social">
                <h4 class="newsletter-social__label">Follow us on</h4>
                <ul class="newsletter-social__list">
                    <li>
                        <a href="#" aria-label="facebook"><i class="lastudioicon-b-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="twitter"><i class="lastudioicon-b-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="instagram"><i class="lastudioicon-b-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="vimeo"><i class="lastudioicon-b-vimeo"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="envato"><i class="lastudioicon-envato"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="newsletter-right"
            style="
                        background-image: url(public/assets/images/newsletter-bg-2.jpg);
                    ">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title-2">
                    10% off when you sign up
                </h4>
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
    </div>
@endsection
