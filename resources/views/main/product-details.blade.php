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
                        <li>
                            <button data-bs-toggle="pill" data-bs-target="#additionalInformation " type="button"
                                aria-selected="false" tabindex="-1" role="tab">
                                Additional information
                            </button>
                        </li>
                        <li>
                            <button data-bs-toggle="pill" data-bs-target="#reviews" type="button" aria-selected="false"
                                tabindex="-1" role="tab">
                                Reviews (03)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="product-single-tab-description">
                                <?= $product->product_description ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="additionalInformation" role="tabpanel">
                            <!-- Product Single Table Start -->
                            <div class="product-single-table">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <tbody>
                                            <tr>
                                                <th>Color</th>
                                                <td>
                                                    <p>Blue, Green, Red</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Product Single Table End -->
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <!-- Product Single Review Start -->
                            <div class="product-single-review">
                                <!-- Product Comment Start -->
                                <div class="product-comment">
                                    <h3 class="comment-title">
                                        3 review for Product Simple
                                    </h3>

                                    <!-- Comment Items Start -->
                                    <ul class="comment-items">
                                        <!-- Comment Item Start -->
                                        <li class="comment-item">
                                            <div class="comment-item__author">
                                                <img src="assets/images/user/user-1.jpg" alt="Author" width="90"
                                                    height="90" loading="lazy">
                                            </div>
                                            <div class="comment-item__content">
                                                <div class="comment-item__rating">
                                                    <span class="star-rating">
                                                        <span
                                                            style="
                                                                    width: 80%;
                                                                "></span>
                                                    </span>
                                                </div>
                                                <p class="comment-item__description">
                                                    Fringed jacquard
                                                    cardigan
                                                </p>
                                                <p class="comment-item__meta">
                                                    <strong>HasTheme</strong>
                                                    - June 3, 2024
                                                </p>
                                            </div>
                                        </li>
                                        <!-- Comment Item End -->

                                        <!-- Comment Item Start -->
                                        <li class="comment-item">
                                            <div class="comment-item__author">
                                                <img src="assets/images/user/user-2.jpg" alt="Author" width="90"
                                                    height="90" loading="lazy">
                                            </div>
                                            <div class="comment-item__content">
                                                <div class="comment-item__rating">
                                                    <span class="star-rating">
                                                        <span
                                                            style="
                                                                    width: 80%;
                                                                "></span>
                                                    </span>
                                                </div>
                                                <p class="comment-item__description">
                                                    Fringed jacquard
                                                    cardigan
                                                </p>
                                                <p class="comment-item__meta">
                                                    <strong>HasTheme</strong>
                                                    - June 3, 2024
                                                </p>
                                            </div>
                                        </li>
                                        <!-- Comment Item End -->

                                        <!-- Comment Item Start -->
                                        <li class="comment-item">
                                            <div class="comment-item__author">
                                                <img src="assets/images/user/user-3.jpg" alt="Author" width="90"
                                                    height="90" loading="lazy">
                                            </div>
                                            <div class="comment-item__content">
                                                <div class="comment-item__rating">
                                                    <span class="star-rating">
                                                        <span
                                                            style="
                                                                    width: 80%;
                                                                "></span>
                                                    </span>
                                                </div>
                                                <p class="comment-item__description">
                                                    Fringed jacquard
                                                    cardigan
                                                </p>
                                                <p class="comment-item__meta">
                                                    <strong>HasTheme</strong>
                                                    - June 3, 2024
                                                </p>
                                            </div>
                                        </li>
                                        <!-- Comment Item End -->
                                    </ul>
                                    <!-- Comment Items End -->
                                </div>
                                <!-- Product Comment End -->

                                <!-- Product Comment Form Start -->
                                <div class="product-comment-form">
                                    <h3 class="comment-title">
                                        Add a review
                                    </h3>

                                    <form action="#">
                                        <!-- comment Form Start -->
                                        <div class="comment-form">
                                            <div class="comment-form__notes">
                                                Your email address will not
                                                be published.
                                            </div>
                                            <div class="product-review-form__rating">
                                                <div class="label">
                                                    Your rating *
                                                </div>
                                                <span class="star-rating">
                                                    <span style="width: 80%"></span>
                                                </span>
                                            </div>
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Your review *</label>
                                                <textarea class="single-form__input"></textarea>
                                            </div>
                                            <!-- Single Form Start -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Single Form Start -->
                                                    <div class="single-form">
                                                        <label class="single-form__label">Name *
                                                        </label>
                                                        <input type="text" class="single-form__input">
                                                    </div>
                                                    <!-- Single Form Start -->
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Single Form Start -->
                                                    <div class="single-form">
                                                        <label class="single-form__label">Email *</label>
                                                        <input type="email" class="single-form__input">
                                                    </div>
                                                    <!-- Single Form Start -->
                                                </div>
                                            </div>

                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <input type="checkbox" name="save" id="save">
                                                <label class="single-form__label checkbox-label" for="save">
                                                    <span></span>
                                                    Save my name, email, and
                                                    website in this browser
                                                    for the next time I
                                                    comment.
                                                </label>
                                            </div>
                                            <!-- Single Form Start -->

                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <button class="single-form__btn btn" type="submit">
                                                    Submit
                                                </button>
                                            </div>
                                            <!-- Single Form Start -->
                                        </div>
                                        <!-- comment Form End -->
                                    </form>
                                </div>
                                <!-- Product Comment Form End -->
                            </div>
                            <!-- Product Single Review End -->
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
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group"
                                aria-label="3 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-10.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                                <img class="product-hover"
                                                    src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes Red Wine
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$49.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group"
                                aria-label="4 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes The Banished
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <del>$59.99</del>
                                            <ins>$39.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group"
                                aria-label="5 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-08.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes Revolutionary Rosé
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$29.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="5"
                                role="group" aria-label="6 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-07.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes The Uprising
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$46.99</ins>
                                            <ins>$36.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                aria-label="1 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-12.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                2024 clare valley watervale riesling
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <del>$39.99</del>
                                            <ins>$29.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group"
                                aria-label="2 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-11.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                2019 Margerum M5 Red Rhône Blend
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$39.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 6"
                                style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-10.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                                <img class="product-hover"
                                                    src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes Red Wine
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$49.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 6"
                                style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes The Banished
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <del>$59.99</del>
                                            <ins>$39.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="4" role="group" aria-label="5 / 6"
                                style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-08.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes Revolutionary Rosé
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$29.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5"
                                role="group" aria-label="6 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-07.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes The Uprising
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$46.99</ins>
                                            <ins>$36.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                data-swiper-slide-index="0" role="group" aria-label="1 / 6"
                                style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-12.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                2024 clare valley watervale riesling
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <del>$39.99</del>
                                            <ins>$29.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                data-swiper-slide-index="1" role="group" aria-label="2 / 6"
                                style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-11.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                2019 Margerum M5 Red Rhône Blend
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$39.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group"
                                aria-label="3 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-10.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                                <img class="product-hover"
                                                    src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes Red Wine
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <ins>$49.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group"
                                aria-label="4 / 6" style="width: 348.25px; margin-right: 16px;">
                                <!-- Single product Start -->
                                <div class="single-product js-scroll ShortFadeInUp scrolled">
                                    <div class="single-product__thumbnail">
                                        <div class="single-product__thumbnail--meta-3">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="heart"><i class="lastudioicon-heart-2"></i></a>
                                        </div>
                                        <div class="single-product__thumbnail--badge onsale">
                                            Sale
                                        </div>
                                        <div class="single-product__thumbnail--holder">
                                            <a href="product-single.html">
                                                <img src="assets/images/products/wines/product-09.png" alt="Product"
                                                    width="344" height="370" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="single-product__thumbnail--meta-2">
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            <a href="#" data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Add to compare" data-bs-custom-class="p-meta-tooltip"
                                                aria-label="compare"><i
                                                    class="lastudioicon-ic_compare_arrows_24px"></i></a>
                                            <button data-bs-tooltip="tooltip" data-bs-placement="top"
                                                data-bs-title="Quickview" data-bs-custom-class="p-meta-tooltip"
                                                data-bs-toggle="modal" data-bs-target="#quickView" aria-label="zoom-in">
                                                <i class="lastudioicon-search-zoom-in"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="single-product__info text-center">
                                        <div class="single-product__info--tags">
                                            <a href="#">Wines</a>
                                        </div>
                                        <h3 class="single-product__info--title">
                                            <a href="product-single.html">
                                                19 Crimes The Banished
                                            </a>
                                        </h3>
                                        <div class="single-product__info--price">
                                            <del>$59.99</del>
                                            <ins>$39.99</ins>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                        </div>
                        <div
                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                role="button" aria-label="Go to slide 1" aria-current="true"></span><span
                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet"
                                tabindex="0" role="button" aria-label="Go to slide 3"></span><span
                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet"
                                tabindex="0" role="button" aria-label="Go to slide 5"></span><span
                                class="swiper-pagination-bullet" tabindex="0" role="button"
                                aria-label="Go to slide 6"></span>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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



    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-to-cart').click(function() {
                var productId = $(this).data('product-id');
                var quantity = 1;

                var data = {
                    'product_id': productId,
                    'quantity': quantity
                };
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Something went wrong!');
                    }
                });
            });
        });
    </script>
@endsection
