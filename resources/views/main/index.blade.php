@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>Navrangaroma Candles</title>
@endsection
@section('content')
    <div>
        <!-- Slider Start -->
        <div class="slider-section slider-active navigation-arrows-style-1">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <!-- Slider Item Start -->
                        <div class="slider-item home-1-slider-style-1 swiper-slide d-md-flex align-items-center home-1-slider-animation"
                            style="background-image: url('{{ url($banner->banner_image) }}');
                                        ">
                            <div class="container-fluid custom-container">
                                <!-- Slider Content Start -->
                                <div class="home-1-slider-content-style-1 text-center">
                                    <h3 class="home-1-slider-content-style-1__sub-title">
                                        {{ $banner->banner_subtitle }},
                                    </h3>
                                    <h2 class="home-1-slider-content-style-1__title">
                                        {{ $banner->banner_title }}
                                    </h2>

                                    <ul class="home-1-slider-content-style-1__btns justify-content-center">
                                        <li class="button-01">
                                            <a class="home-1-slider-content-style-1__btn" href="{{ $banner->banner_link }}">
                                                {{ $banner->banner_button_text }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Slider Content End -->
                            </div>
                        </div>
                        <!-- Slider Item End -->
                    @endforeach
                </div>

                <div class="swiper-button-prev">
                    <i class="lastudioicon-arrow-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="lastudioicon-arrow-right"></i>
                </div>
            </div>
            <div class="banner-bottom-slide container-fluid">
                <marquee behavior="alternate" direction="left">
                    <span>EASY RETURN</span> |
                    <span>Cash On Deilivery</span> |
                    <span>Free Shipping</span> |
                    <span>Pan India Delivery</span> |
                    <span>100% Natural</span>
                </marquee>
            </div>
        </div>
        <!-- Slider End -->

        <!-- Product Start -->
        <div class="product-section section-padding">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">New arrival</h2>
                    <div class="section-title__shape">
                        <img src="public/assets/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Product wrapper Start -->
                <div class="product-wrapper">
                    <div class="row g-xxl-4">
                        @foreach ($latestProducts as $product)
                            <div class="col-lg custom-col-5 col-md-4 col-sm-4 col-6">
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
                                        {{-- <div class="single-product__info--rating">
                                            <span class="star-rating">
                                                <span style="width: 80%">
                                                </span>
                                            </span>
                                        </div> --}}
                                        <div class="button-02">
                                            <a href="#" data-product-id="{{ $product->product_id }}"
                                                class="add-to-cart special-offer-content__btn">
                                                Add to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product End -->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Product wrapper End -->

                <!-- Product More Start -->
                <div class="text-center js-scroll ShortFadeInUp scrolled">
                    <a class="view-more-btn" href="{{ route('shop') }}">
                        VIEW MORE PRODUCTS
                    </a>
                </div>
                <!-- Product More End -->
            </div>
        </div>
        <!-- Product End -->

        <!-- Banner Start -->
        <div class="banner-section section-padding-1">
            <div class="container-fluid custom-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">Featured Candles</h2>
                    <div class="section-title__shape">
                        <img src="public/assets/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Banner Wrapper Start -->
                <div class="banner-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Banner Item Start -->
                            <div class="banner-item js-scroll ShortFadeInUp scrolled">
                                <div class="banner-item__badge trend">
                                    <span>trend</span>
                                </div>
                                <div class="banner-item__image">
                                    <img src="{{ url($trendBanner->banner_image) }}" alt="Banner" width="711" height="695"
                                        loading="lazy" />
                                </div>
                                <div class="banner-item__content">
                                    <h3 class="banner-item__title">
                                        {{ $trendBanner->banner_subtitle }}
                                    </h3>
                                    <div class="banner-item__divider"></div>
                                    <p class="banner-item__description">
                                        {{ $trendBanner->banner_title }}
                                    </p>
                                    <a class="banner-item__btn" href="{{ $trendBanner->banner_link }}">
                                        {{ $trendBanner->banner_button_text }}
                                    </a>
                                </div>
                            </div>
                            <!-- Banner Item End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Banner Item Start -->
                            <div class="banner-item js-scroll ShortFadeInUp scrolled">
                                <div class="banner-item__badge hot">
                                    <span>Hot</span>
                                </div>
                                <div class="banner-item__image">
                                    <img src="{{ url($hotBanner->banner_image) }}" alt="Banner" width="711" height="332"
                                        loading="lazy" />
                                </div>
                                <div class="banner-item__content">
                                    <h3 class="banner-item__title">
                                        {{ $hotBanner->banner_subtitle }}
                                    </h3>
                                    <div class="banner-item__divider"></div>
                                    <p class="banner-item__description">
                                        {{ $hotBanner->banner_title }}
                                    </p>
                                    <a class="banner-item__btn" href="{{ $hotBanner->banner_link }}">
                                        {{ $hotBanner->banner_button_text }}
                                    </a>
                                </div>
                            </div>
                            <!-- Banner Item End -->

                            <!-- Banner Item Start -->
                            <div class="banner-item js-scroll ShortFadeInUp scrolled">
                                <div class="banner-item__badge sale">
                                    <span>Sale</span>
                                </div>
                                <div class="banner-item__image">
                                    <img src="{{ url($saleBanner->banner_image) }}" alt="Banner" width="711" height="332"
                                        loading="lazy" />
                                </div>
                                <div class="banner-item__content">
                                    <h3 class="banner-item__title">
                                        {{ $saleBanner->banner_subtitle }}
                                    </h3>
                                    <div class="banner-item__divider"></div>
                                    <p class="banner-item__description">
                                        {{ $saleBanner->banner_title }}
                                    </p>
                                    <a class="banner-item__btn" href="{{ $saleBanner->banner_link }}">
                                        {{ $saleBanner->banner_button_text }}
                                    </a>
                                </div>
                            </div>
                            <!-- Banner Item End -->
                        </div>
                    </div>
                </div>
                <!-- Banner Wrapper End -->
            </div>
        </div>
        <!-- Banner End -->

        <!-- Features Text Start -->
        <div class="features-text section-padding js-scroll ShortFadeInUp scrolled">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide features-text-item">
                        <span>
                            Chose the candle, brighten your home -
                        </span>
                    </div>
                    <div class="swiper-slide features-text-item">
                        <span>We made with love -</span>
                    </div>
                    <div class="swiper-slide features-text-item">
                        <span>
                            Chose the candle, brighten your home -
                        </span>
                    </div>
                    <div class="swiper-slide features-text-item">
                        <span>We made with love -</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Text End -->


        <!-- Brand Start -->
        <div class="brand-section section-padding">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">Find Us On Your Favorite Platforms</h2>
                    <div class="section-title__shape">
                        <img src="public/assets/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Brand Active Start -->
                <div class="brand-active js-scroll ShortFadeInUp">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Brand Item Start -->
                            <div class="brand-item swiper-slide">
                                <img src="public/assets/images/brand/indiamart.png" alt="Brand" loading="lazy" />
                            </div>
                            <!-- Brand Item End -->
                            <!-- Brand Item Start -->
                            <div class="brand-item swiper-slide">
                                <a href="https://www.amazon.in/storefront?me=A9VTSONAWU0E&ref_=ssf_share" target="_blank">
                                    <img src="public/assets/images/brand/amazon.png" alt="Brand" loading="lazy" />
                                </a>
                            </div>
                            <!-- Brand Item End -->
                            <!-- Brand Item Start -->
                            <div class="brand-item swiper-slide">
                                <a href="https://www.flipkart.com/home-decor/diyas-candles-holders/candles/the-remedial-store~brand/pr?sid=arb,mvm,p0s&marketplace=FLIPKART&otracker=product_breadCrumbs_The+Remedial+Store+Candles"
                                    target="_blank">
                                    <img src="public/assets/images/brand/flipkart.png" alt="Brand" loading="lazy" />
                                </a>
                            </div>
                            <!-- Brand Item End -->
                            <!-- Brand Item Start -->
                            <div class="brand-item swiper-slide">
                                <a href="https://www.meesho.com/CHOCOCOSMOCENTER?ms=2" target="_blank">
                                    <img src="public/assets/images/brand/meesho.png" alt="Brand" loading="lazy" />
                                </a>
                            </div>
                            <!-- Brand Item End -->
                            <!-- Brand Item Start -->
                            <div class="brand-item swiper-slide">
                                <img src="public/assets/images/brand/myntra.png" alt="Brand" loading="lazy" />
                            </div>
                            <!-- Brand Item End -->
                        </div>
                    </div>
                </div>
                <!-- Brand Active End -->
            </div>
        </div>
        <!-- Brand End -->

        <!-- Product Best Selling Start -->
        <div class="product-section section-padding">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">Best Selling</h2>
                    <div class="section-title__shape">
                        <img src="public/assets/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Product Wrapper Start -->
                <div class="product-wrapper product-active navigation-arrows-style-2">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($featureProducts as $product)
                                <div class="swiper-slide">
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
                                                    data-bs-tooltip="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                    aria-label="Add to cart">
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
                                            {{-- <div class="single-product__info--rating">
                                                <span class="star-rating">
                                                    <span style="width: 80%">
                                                    </span>
                                                </span>
                                            </div> --}}
                                            <div class="button-02">
                                                <a href="#" data-product-id="{{ $product->product_id }}"
                                                    class="add-to-cart special-offer-content__btn">
                                                    Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single product End -->
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="product-arrow js-scroll ShortFadeInUp scrolled">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12.624" height="30.79"
                                viewBox="0 0 12.624 30.79">
                                <path d="m11.229 1.395-10 14 10 14" fill="none" stroke="currentColor"
                                    stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12.624" height="30.79"
                                viewBox="0 0 12.624 30.79">
                                <path d="m1.395 1.395 10 14-10 14" fill="none" stroke="currentColor" stroke-linecap="square"
                                    stroke-miterlimit="10" stroke-width="2"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Product Wrapper End -->
            </div>
        </div>
        <!-- Product Best Selling End -->

        <!-- Blog Start -->
        <div class="blog-section section-padding">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title__title">Blog & Insights</h2>
                    <div class="section-title__shape">
                        <img src="public/assets/images/section-shape-1.svg" alt="shape" width="129" height="136"
                            loading="lazy" />
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Blog Wrapper Start -->
                <div class="blog-wrapper">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6">
                                <!-- Blog item Start -->
                                <div class="blog-item js-scroll ShortFadeInUp scrolled">
                                    <div class="blog-item__image">
                                        <a href="{{ route('blog.detail', $blog->slug) }}">
                                            <img src="{{ url($blog->feature_image) }}" alt="Blog" width="808" height="474"
                                                loading="lazy" />
                                        </a>
                                    </div>
                                    <div class="blog-item__content">
                                        <div class="blog-item__inner">
                                            <h3 class="blog-item__title">
                                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                                    {{ $blog->title }}

                                                </a>
                                            </h3>
                                            <ul class="blog-item__meta">
                                                <li>
                                                    <span>{{ $blog->created_at ? date('d-M-Y', strtotime($blog->created_at)) : 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <span>
                                                        By
                                                        <a href="#">
                                                            {{ $blog->author }}
                                                        </a>
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="blog-item__btn-wrap">
                                                <a class="blog-item__btn" href="{{ route('blog.detail', $blog->slug) }}">
                                                    Read more
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Blog item End -->
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Blog Wrapper End -->

                <!-- Blog More Start -->
                <div class="text-center js-scroll ShortFadeInUp scrolled">
                    <a class="view-more-btn view-more-btn-2" href="{{ route('blogs') }}">
                        VIEW MORE BLOG
                    </a>
                </div>
                <!-- Blog More End -->
            </div>
        </div>
        <!-- Blog End -->


        <!-- Client Start -->
        <div class="client-section section-padding-02">
            <div class="container-fluid home-container">
                <!-- Section Title Start -->
                <div class="section-title-2 text-center js-scroll ShortFadeInUp scrolled">
                    <h2 class="section-title-2__title">Client Reviews</h2>
                </div>
                <!-- Section Title End -->

                <!-- Client Wrapper Start -->
                <div class="client-wrapper client-active swiper-dot-style-2 js-scroll ShortFadeInUp scrolled">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Client Item Start -->
                            <div class="client-item swiper-slide bg-cream">
                                {{-- <div class="client-item__image">
                                    <img src="{{ url('public/assets/images/user/user-1.jpg') }}" alt="user" width="60"
                                        height="60" loading="lazy" />
                                </div> --}}
                                <div class="client-item__content">
                                    <p class="client-item__description">
                                        The best customer support I have
                                        ever had with themeforest templates.
                                        Thank you so much for your support,
                                        I will buy other themes by you!
                                    </p>
                                    <div class="client-item__rating">
                                        <span class="star-rating">
                                            <span style="width: 80%">
                                            </span>
                                        </span>
                                    </div>
                                    <h3 class="client-item__name">
                                        Aman Rajput
                                    </h3>
                                </div>
                            </div>
                            <!-- Client Item End -->
                            <!-- Client Item Start -->
                            <div class="client-item swiper-slide bg-cream">
                                {{-- <div class="client-item__image">
                                    <img src="{{ url('public/assets/images/user/user-2.jpg') }}" alt="user" width="60"
                                        height="60" loading="lazy" />
                                </div> --}}
                                <div class="client-item__content">
                                    <p class="client-item__description">
                                        Out of all themes I purchased this
                                        had the best document included about
                                        installing and editing the theme.
                                        Beginners friendly.
                                    </p>
                                    <div class="client-item__rating">
                                        <span class="star-rating">
                                            <span style="width: 100%">
                                            </span>
                                        </span>
                                    </div>
                                    <h3 class="client-item__name">
                                        Dilpreet Kaur
                                    </h3>
                                </div>
                            </div>
                            <!-- Client Item End -->
                            <!-- Client Item Start -->
                            <div class="client-item swiper-slide bg-cream">
                                {{-- <div class="client-item__image">
                                    <img src="{{ url('public/assets/images/user/user-3.jpg') }}" alt="user" width="60"
                                        height="60" loading="lazy" />
                                </div> --}}
                                <div class="client-item__content">
                                    <p class="client-item__description">
                                        Great theme! bought it 3 years ago
                                        and still current on design and
                                        helping us to sell online our
                                        products. Also had a problem and
                                        they solved it very well,
                                    </p>
                                    <div class="client-item__rating">
                                        <span class="star-rating">
                                            <span style="width: 80%">
                                            </span>
                                        </span>
                                    </div>
                                    <h3 class="client-item__name">
                                        Arti Nautiyal
                                    </h3>
                                </div>
                            </div>
                            <!-- Client Item End -->
                            <!-- Client Item Start -->
                            <div class="client-item swiper-slide bg-cream">
                                {{-- <div class="client-item__image">
                                    <img src="{{ url('public/assets/images/user/user-4.jpg') }}" alt="user" width="60"
                                        height="60" loading="lazy" />
                                </div> --}}
                                <div class="client-item__content">
                                    <p class="client-item__description">
                                        Guys, you don’t just buy the theme,
                                        you also buy excellent support from
                                        the devs, so be sure that whatever
                                        problem you face, they will help you
                                        with it 😉 5 stars!
                                    </p>
                                    <div class="client-item__rating">
                                        <span class="star-rating">
                                            <span style="width: 100%">
                                            </span>
                                        </span>
                                    </div>
                                    <h3 class="client-item__name">
                                        Madhu Shah
                                    </h3>
                                </div>
                            </div>
                            <!-- Client Item End -->
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- Client Wrapper End -->
            </div>
        </div>
        <!-- Client End -->


    </div>
@endsection