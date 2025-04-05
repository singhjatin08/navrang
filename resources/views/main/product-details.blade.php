@extends('main/include/layout')
@section('content')
    <main style="margin-top: 145px;">
        <!-- Breadcrumbs Start -->
        <div class="single-breadcrumbs">
            <div class="container-fluid custom-container">
                <ul class="single-breadcrumbs-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">{{ $product->category_name }} </a></li>
                    <li><span>{{ $product->product_title }}</span></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Product Single Start -->
        <div class="product-single-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Product Single Wrapper Start -->
                <div class="product-single-wrapper">
                    <div class="product-single-col-1">
                        <!-- Product Single image Start -->
                        <div class="product-single-image">
                            <div class="product-single-slide navigation-arrows-style-1">
                                <div
                                    class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                                    <div class="swiper-wrapper" id="swiper-wrapper-8c671006b08c4b1069" aria-live="polite"
                                        style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="product-single-slide-item swiper-slide swiper-slide-active"
                                            role="group" aria-label="1 / 4" style="width: 692px;">
                                            <img src="{{ url('') }}/{{ $product->product_image }}"
                                                alt="Product single" width="694" height="728">
                                        </div>

                                        @foreach ($product->gallery_images as $item)
                                            <div class="product-single-slide-item swiper-slide swiper-slide-next"
                                                role="group" aria-label="2 / 4" style="width: 692px;">
                                                <img src="{{ url('') }}/{{ $item->file_path }}" alt="Product single"
                                                    width="694" height="728">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                        aria-controls="swiper-wrapper-8c671006b08c4b1069" aria-disabled="false">
                                        <i class="lastudioicon-arrow-right"></i>
                                    </div>
                                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-8c671006b08c4b1069"
                                        aria-disabled="true">
                                        <i class="lastudioicon-arrow-left"></i>
                                    </div>
                                    <div class="product-single-zoom">
                                        <div class="zoom">
                                            <a class="product-glightbox"
                                                href="{{ url('') }}/{{ $product->product_image }}"
                                                aria-label="zoom image"></a>
                                            @foreach ($product->gallery_images as $item)
                                                <a class="product-glightbox"
                                                    href="{{ url('') }}/{{ $item->file_path }}"
                                                    aria-label="zoom image"></a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            <div class="product-single-thumb">
                                <div
                                    class="swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                                    <div class="swiper-wrapper" id="swiper-wrapper-ed4c6f729561031d5" aria-live="polite"
                                        style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="product-single-thumb-item swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                            role="group" style="width: 143px; margin-right: 30px;">
                                            <img src="{{ url('') }}/{{ $product->product_image }}"
                                                alt="Product single" width="144" height="155">
                                        </div>
                                        @foreach ($product->gallery_images as $item)
                                            <div class="product-single-thumb-item swiper-slide swiper-slide-next"
                                                role="group" style="width: 143px; margin-right: 30px;">
                                                <img src="{{ url('') }}/{{ $item->file_path }}" alt="Product single"
                                                    width="144" height="155">
                                            </div>
                                        @endforeach

                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Product Single image End -->
                    </div>

                    <div class="product-single-col-2">
                        <!-- Product Single content Start -->
                        <div class="product-single-content">
                            <h2 class="product-single-content__title">
                                {{ $product->product_title }}
                            </h2>
                            <div class="product-single-content__price-stock">
                                <div class="product-single-content__price">
                                    <ins>INR <span
                                            class="text-danger"><strike>{{ $product->product_sale_price }}</strike></span>
                                        {{ $product->product_price }}</ins>
                                </div>
                                <div class="product-single-content__stock">
                                    <span class="stock-icon">
                                        <i class="dlicon ui-1_check-circle-08"></i>
                                    </span>
                                    <span class="stock-text">
                                        In stock
                                    </span>
                                </div>
                            </div>

                            <div class="product-single-content__add-to-cart-wrapper">
                                <div class="product-single-content__quantity-add-to-cart">
                                    <div class="product-single-content__quantity product-quantity">
                                        <button type="button" class="decrease" aria-label="delete">
                                            <i class="lastudioicon-i-delete-2"></i>
                                        </button>
                                        <input class="quantity-input" type="text" value="01">
                                        <button type="button" class="increase" aria-label="add">
                                            <i class="lastudioicon-i-add-2"></i>
                                        </button>
                                    </div>
                                    <button class="product-single-content__add-to-cart btn add-to-cart"
                                        data-product-id="{{ $product->product_id }}">
                                        Add to cart
                                    </button>
                                </div>

                                <!-- <a href="#" class="product-add-compare">
                                                Add to Compare
                                            </a> -->
                                <a href="#" class="product-add-wishlist">
                                    Add to Wishlist
                                </a>
                            </div>
                            <div class="product-single-content__short-description">
                                <?= $product->product_short_description ?>
                            </div>
                            <div class="product-single-content__meta">
                                <div class="product-single-content__meta--item">
                                    <div class="label">Product ID:</div>
                                    <div class="content">{{ $product->product_id }}</div>
                                </div>
                                <div class="product-single-content__meta--item">
                                    <div class="label">Categories:</div>
                                    <div class="content">
                                        <a href="#">{{ $product->category_name }}</a>
                                    </div>
                                </div>
                                <div class="product-single-content__meta--item">
                                    <div class="label">Tag:</div>
                                    <div class="content">
                                        <a href="#">Teen</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-single-content__social">
                                <div class="label">Share</div>
                                <ul class="socail-icon">
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
                                        <a href="#" aria-label="linkedin">
                                            <i class="lastudioicon-b-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product Single content End -->
                    </div>
                </div>
                <!-- Product Single Wrapper End -->
            </div>
        </div>
        <!-- Product Single End -->

        <!-- Product Single Tabs Start -->
        <div class="product-single-tabs-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Product Single Tabs Start -->
                <div class="product-single-tabs">
                    <ul class="nav justify-content-center" role="tablist">
                        <li>
                            <button class="active" data-bs-toggle="pill" data-bs-target="#description" type="button"
                                aria-selected="true" role="tab">
                                Description
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product-single-tab-description">
                                <?= $product->product_description ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Single Tabs End -->
            </div>
        </div>

        <!-- Related Product Start -->
<div class="related-product-section section-padding-2">
    <div class="container-fluid custom-container">
        <!-- Related Title Start -->
        <div class="related-title text-center">
            <h2 class="related-title__title">Related Products</h2>
        </div>
        <!-- Related Title End -->

        <!-- Related Product Start -->
        <div class="related-product-active swiper-dot-style-1">
            <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-b791146510146bd32" aria-live="polite"
                    style="transition-duration: 0ms; transform: translate3d(-1457px, 0px, 0px);">
                    
                    @foreach ($suggestedProduct as $suggest)
                        <div class="swiper-slide" role="group" aria-label="Product">
                            <!-- Single product Start -->
                            <div class="single-product js-scroll ShortFadeInUp scrolled">
                                <div class="single-product__thumbnail">
                                    <div class="single-product__thumbnail--meta-3">
                                        <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                            aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                    </div>
                                    @if (!empty($suggest->product_sale_price))
                                            <div class="single-product__thumbnail--badge onsale">
                                                Sale
                                            </div>
                                        @endif
                                    <div class="single-product__thumbnail--holder">
                                        <a href="{{ url('product-details/'.$suggest->product_id) }}">
                                            <img src="{{ url($suggest->product_image) }}" alt="{{ $suggest->product_title }}"
                                                width="344" height="370" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="single-product__thumbnail--meta-2">
                                        <a href="#" class="add-to-cart" data-product-id="{{ $suggest->product_id }}" data-bs-tooltip="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                            aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                    </div>
                                </div>
                                <div class="single-product__info text-center">
                                    <div class="single-product__info--tags">
                                        <a href="#">{{ $suggest->category_name }}</a>
                                    </div>
                                    <h3 class="single-product__info--title">
                                        <a href="{{ url('product-details/'.$suggest->product_id) }}">
                                            {{ $suggest->product_title }}
                                        </a>
                                    </h3>
                                    <div class="single-product__info--price">
                                        @if (!is_null($suggest->product_sale_price) && $suggest->product_sale_price != '')
                                            <del>₹ {{ $suggest->product_price }}</del>
                                            <ins>₹ {{ $suggest->product_sale_price }}</ins>
                                        @else
                                            <ins>₹ {{ $suggest->product_price }}</ins>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Single product End -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Related Product End -->
    </div>
</div>


        <!-- Related Product End -->

        <!-- Newsletter Start -->
        <!-- Newsletter Start -->
        <div class="newsletter-section">
            <div class="newsletter-left" style="background-image: url(assets/images/newsletter-bg-1.jpg)">
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
            <div class="newsletter-right" style="background-image: url(assets/images/newsletter-bg-2.jpg)">
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
    </main>


@endsection
