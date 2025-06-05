@extends('main.include.layout')
@section('meta')

    @if (!empty($category_meta))
        {!! $category_meta->meta_tags !!}
    @else
        @php
            echo $meta->head_scripts;
        @endphp
        <title>SHOP - Navrangaroma Candles</title>
    @endif

@endsection
@section('content')

    <div>

        <!-- Banner Item 02 Start -->
        {{-- <div class="banner-item-2 banner-bg-02 js-scroll ShortFadeInUp scrolled" style="
                                background-image: url(public/assets/images/banner/banner-6.jpg);
                            ">
            <div class="banner-item-2__content text-center ms-auto">
                <h3 class="banner-item-2__sub-title">
                    Terracotta Tealight Holder
                </h3>
                <h2 class="banner-item-2__title">New trend</h2>
                <a class="banner-item-2__btn" href="#">
                    Shop now
                </a>
            </div>
        </div> --}}
        <!-- Banner Item 02 End -->

        <!-- Breadcrumbs Start -->
        {{-- <div class="single-breadcrumbs">
            <div class="container-fluid custom-container">
                <ul class="single-breadcrumbs-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                </ul>
            </div>
        </div> --}}
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Shop
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Our Products</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Shop Start -->
        <div class="shop-section section-padding-2">
            <div class="container-fluid custom-container">

                <!-- Shop Wrapper Start -->
                <div class="shop-wrapper">
                    <div class="row">

                        @if(isset($searchQuery))
                            <h5>Search results for: "{{ $searchQuery }}"</h5>
                            @if($products->isEmpty())
                                <p>No products found.</p>
                            @endif
                        @endif


                        @foreach ($products as $product)
                            <div class="col-lg custom-col-5 col-md-3 col-sm-4 col-6">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--holder">
                                            <a href="{{ route('product-details', $product->product_id) }}">
                                                <img src="{{ url($product->product_image) }}" alt="Product" width="392"
                                                    height="400" loading="lazy" />
                                            </a>
                                        </div>
                                        @if (!empty($product->product_discount_percentage) && $product->product_discount_percentage != '0')
                                            <div class="single-product__thumbnail--badge onsale">
                                                Sale {{ $product->product_discount_percentage }}% OFF
                                            </div>
                                        @endif
                                        {{-- <div class="single-product__thumbnail--meta-2">
                                            <a href="#" class="add-to-cart" data-id="{{ $product->product_id }}"
                                                data-bs-tooltip="tooltip" data-bs-placement="top" data-bs-title="Add to cart"
                                                data-bs-custom-class="p-meta-tooltip" aria-label="Add to cart">
                                                <i class="lastudioicon-shopping-cart-3"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                    <div class="single-product__info">
                                        <div class="single-product__info--tags">
                                            <a href="#">{{ $product->category_name }}</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="{{ route('product-details', $product->product_id) }}">
                                                {{ Str::limit($product->product_title, 50) }}
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            ₹
                                            @if (is_numeric($product->product_price) && is_numeric($product->product_discount_percentage))
                                                <span style="text-decoration: line-through;"
                                                    class="text-danger">{{ $product->product_price }}</span>
                                                <span>{{ $product->product_price - ($product->product_price / 100 * $product->product_discount_percentage) }}</span>
                                            @else
                                                <span>{{ $product->product_price }}</span>
                                            @endif
                                        </div>
                                        @if ($product->stock == 0)
                                            <div class="single-product__stock-status"
                                                style="color: red; font-weight: bold; margin-top: 10px;">
                                                Out of Stock
                                            </div>
                                        @else
                                            <div class="button-02">
                                                <a href="#" data-product-id="{{ $product->product_id }}"
                                                    class="add-to-cart special-offer-content__btn">
                                                    Add to cart
                                                </a>
                                            </div>
                                        @endif

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

                            {{-- Previous Page Link --}}
                            <li>
                                <a href="{{ $products->previousPageUrl() }}"
                                    class="{{ $products->onFirstPage() ? 'disabled' : '' }}">
                                    <i class="lastudioicon-arrow-left"></i>
                                </a>
                            </li>

                            {{-- First Page --}}
                            @if ($products->currentPage() > 3)
                                <li><a href="{{ $products->url(1) }}">1</a></li>
                                @if ($products->currentPage() > 4)
                                    <li><span>...</span></li>
                                @endif
                            @endif

                            {{-- Pages Around Current --}}
                            @for ($i = max(1, $products->currentPage() - 1); $i <= min($products->lastPage(), $products->currentPage() + 1); $i++)
                                <li>
                                    <a href="{{ $products->url($i) }}" class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor

                            {{-- Last Page --}}
                            @if ($products->currentPage() < $products->lastPage() - 2)
                                @if ($products->currentPage() < $products->lastPage() - 3)
                                    <li><span>...</span></li>
                                @endif
                                <li><a href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
                            @endif

                            {{-- Next Page Link --}}
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

   
    </div>
@endsection