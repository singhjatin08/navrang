<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <script>
        window.appUrl = "{{ config('app.url') }}";
        // window.appUrl = "https://www.navrangaromacandles.com";
    </script>


    @yield('meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL('public/assets/images/favicon.png') }}" />

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/css/lastudioicon.css') }}" />

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ url('public/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/css/nice-select2.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('public/assets/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/assets/css/new-style.css') }}" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <link href="{{ url('public/admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"
        rel="stylesheet">
    <script src="{{ url('public/admin_assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

</head>


<body>
    @php
        echo $meta->body_scripts;
    @endphp

    <!-- Header Start -->
    <header class="header bg-white header-height">
        <!-- Header Top Start -->
        <div class="header__top">
            <div class="container-fluid custom-container">
                <div class="header__top--wrapper justify-content-center">
                    <p>FLASH SALE – OFF 30% FOR ALL PRODUCTS / ONLY THIS WEEK</p>
                </div>
            </div>
        </div>
        <!-- Header Top End -->

        <!-- Header Middle Start -->
        <div class="d-flex align-items-center  header__main">
            <div class="container-fluid custom-container">
                <div class="row align-items-center py-md-2 py-2">
                    <div class="col-md-2 col-5">
                        <!-- Header Middle Logo Start -->
                        <div class="header-mid-logo text-md-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('public/assets/images/logo.png') }}" alt="Logo" width="200"
                                    height="38" />
                            </a>
                        </div>
                        <!-- Header Middle Logo End -->
                    </div>
                    <div class="col-md-10 col-7 d-flex justify-content-end">
                        <!-- Header Main Menu Start -->
                        <nav class="header__main--menu position-relative  d-none d-lg-flex">
                            <!-- Menu Item List Start -->
                            <ul
                                class="menu-items-list menu-uppercase menu-items-list--dark justify-content-center d-flex">
                                <li>
                                    <a class="active" href="{{ url('/') }}">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="position-static">
                                    <a href="{{ url('shop') }}">
                                        <span>Shop</span>
                                    </a>
                                </li>
                                <li class="position-static">
                                    <a href="#">
                                        <span>Collections</span>
                                        <i class="lastudioicon-down-arrow" aria-hidden="true"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        @foreach ($header_categories as $category)
                                            <li><a
                                                    href="{{ url('category/' . $category->slug) }}">{{ $category->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('bulk-rates') }}">
                                        <span>Bulk Rates</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('contact') }}"><span>Contact Us</span></a>
                                </li>
                            </ul>
                            <!-- Menu Item List End -->
                        </nav>

                        <span>&nbsp; &nbsp; &nbsp;</span>

                        <!-- Header Main Menu End -->
                        <div class="d-flex justify-content-end align-items-center">
                            <!-- Header Middle Meta Start -->
                            <div class="header-mid-meta">
                                <ul class="header-mid-meta__item justify-content-end">
                                    <li>
                                        <a href="{{ route('my-account') }}" aria-label="My Account">
                                            <i class="lastudioicon-single-01-2"></i>
                                        </a>
                                    </li>
                                    <li class="search">
                                        <button data-bs-toggle="modal" data-bs-target="#SearchModal"
                                            aria-label="search">
                                            <i class="lastudioicon-zoom-1"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button data-bs-toggle="offcanvas" data-bs-target="#cartSidebar">
                                            <i class="lastudioicon-bag-20"></i>
                                            <span class="badge cartCount" id="cartCount"></span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Header Middle Meta End -->

                            <!-- Header Middle Toggle Start -->
                            <div class="header-mid-toggle text-end d-lg-none">
                                <button class="header-mid-toggle__toggle" data-bs-toggle="offcanvas"
                                    data-bs-target="#mobileMenu" aria-label="Menu">
                                    <i class="lastudioicon-menu-4-2"></i>
                                </button>
                            </div>
                            <!-- Header Middle Toggle End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Middle End -->

    </header>
    <!-- Header End -->

    <!-- Cart Offcanvas Start -->
    <div class="offcanvas offcanvas-end cart-offcanvas" id="cartSidebar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">My Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="remove">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="offcanvas-cart-list">

            </ul>
        </div>
        <div class="offcanvas-footer bg-light">

            <!-- Cart Totals Table Start-->
            <div class="cart-totals-table">
                <table class="table">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td>
                                <span>$195.97</span>
                            </td>
                        </tr>

                        <tr class="cart-shipping-totals">
                            <th>Shipping</th>
                            <td>
                                <ul class="shipping-methods">
                                    <li class="single-form">
                                        <input type="radio" name="shipping" id="flat-rate" />
                                        <label for="flat-rate" class="single-form__label radio-label">
                                            <span></span>
                                            Flat rate:
                                            <strong class="price">$20.00</strong>
                                        </label>
                                    </li>
                                    <li class="single-form">
                                        <input type="radio" name="shipping" id="local-pickup" />
                                        <label for="local-pickup" class="single-form__label radio-label">
                                            <span></span>
                                            Local pickup
                                        </label>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total">
                                <strong><span>$215.97</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Cart Totals Table End-->

            <!-- Cart Buttons End-->
            <div class="cart-buttons">
                {{-- <a href="#" class="cart-buttons__btn-1 btn">Checkout</a> --}}
                <a href="{{ route('cart') }}" class="cart-buttons__btn-2 btn">View Cart</a>
            </div>
            <!-- Cart Buttons End-->
        </div>
    </div>
    <!-- Cart Offcanvas End -->

    <!-- Search Start -->
    <div class="search-modal modal fade" id="SearchModal">
        <!-- Search Close Start -->
        <button class="search-modal__close" data-bs-dismiss="modal" aria-label="remove">
            <i class="lastudioicon-e-remove"></i>
        </button>
        <!-- Search Close End  -->

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Search Form Start  -->
                <div class="search-modal__form">
                    <form action="{{ url('/search') }}" method="GET">
                        <input type="text" name="search" placeholder="Search product…" />
                        <button type="submit" aria-label="search">
                            <i class="lastudioicon-zoom-1"></i>
                        </button>
                    </form>

                </div>
                <!-- Search Form End  -->
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Mobile Menu Start -->
    <div class="mobile-menu offcanvas offcanvas-start" tabindex="-1" id="mobileMenu">
        <!-- offcanvas-header Start -->
        <div class="offcanvas-header">
            <button type="button" class="mobile-menu__close" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="lastudioicon-e-remove"></i>
            </button>
        </div>
        <!-- offcanvas-header End -->

        <!-- offcanvas-body Start -->
        <div class="offcanvas-body">
            <nav class="navbar-mobile-menu">
                <ul class="mobile-menu-items">
                    <li>
                        <a class="active" href="{{ url('/') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="position-static">
                        <a href="{{ url('shop') }}">
                            <span>Shop</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Collections
                            <span class="menu-expand" aria-label="down-arrow">
                                <i class="lastudioicon-down-arrow"></i>
                            </span>
                        </a>
                        <div class="mega-menu">
                            <div class="mega-menu__content">
                                <h4 class="mega-menu__content--title">
                                    Best Selling Products
                                </h4>
                                <div class="d-flex flex-wrap">
                                    <ul class="mega-menu__content--list">
                                        @foreach ($header_categories as $category)
                                            <li><a
                                                    href="{{ url('category/' . $category->slug) }}">{{ $category->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('bulk-rates') }}">
                            <span>Bulk Rates</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('contact') }}"><span>Contact Us</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- offcanvas-body end -->
    </div>
    <!-- Mobile Menu End -->



    <main>
        @yield('content')
    </main>


    <!-- Footer Start -->
    <footer class="footer-section">
        <div class="container-fluid custom-container">
            <!-- Footer Main Start -->
            <div class="footer-main">
                <div class="footer-col-1 align-self-center">
                    <!-- Footer About Start -->
                    <div class="footer-about text-xxl-start text-center mx-xxl-0 mx-auto">
                        <a class="logo justify-content-xxl-start justify-content-center" href="#">
                            <img src="{{ url('public/assets/images/logo.png') }}" alt="Logo" width="110" height="32"
                                loading="lazy" />
                        </a>
                    </div>
                    <!-- Footer About End -->
                </div>
                <div class="footer-col-2">
                    <!-- Footer Link Start -->
                    <div class="footer-link">
                        <div class="footer-link__wrapper">
                            <h2 class="footer-title">Company links</h2>

                            <ul class="footer-link__list">
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('shop') }}">Shop</a></li>
                                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                            </ul>
                        </div>
                        <div class="footer-link__wrapper">
                            <h2 class="footer-title">Top Category</h2>

                            <ul class="footer-link__list">
                                @foreach ($top_categories as $category)
                                    <li>
                                        <a
                                            href="{{ url('category/' . $category->slug) }}">{{ $category->category_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="footer-link__wrapper">
                            <h2 class="footer-title">Contact</h2>

                            <ul class="footer-link__list">
                                <li>
                                    <span>
                                        69/6A NAJAFGARH INDUSTRIAL AREA RAMA
                                        RAMA ROAD PANDIT JI POORI WALA.
                                    </span>
                                </li>
                                <li>
                                    <a href="mailto:info@navrangaromacandles.com">
                                        info@navrangaromacandles.com
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+91 7982083234">+91 7982083234</a>
                                </li>
                                <ul class="footer-newsletter__social">
                                    <li>
                                        <a href="https://www.facebook.com/candlesbynavrang/" target="_blank"
                                            aria-label="facebook">
                                            <i class="lastudioicon-b-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://x.com/navrangaroma" target="_blank" aria-label="twitter">
                                            <i class="lastudioicon-b-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/navrangaromacandles/" target="_blank"
                                            aria-label="instagram">
                                            <i class="lastudioicon-b-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Link End -->
                </div>
                <div class="footer-col-3">
                    <!-- Footer Newsletter Start -->
                    <div class="footer-newsletter">
                        <h2 class="footer-title">Stay with us</h2>

                        <div class="footer-newsletter__form">
                            <p>
                                Enter your email below to be the first to know about
                                new collections and product launches.
                            </p>
                            <form action="#" class="subscribeForm">
                                <div class="footer-newsletter__input">
                                    <input type="email" name="email" placeholder="Email address..." />
                                    <button type="submit">Subscribe</button>
                                </div>
                            </form>
                            <div class="error email_err"></div>

                        </div>
                    </div>
                    <!-- Footer Newsletter End -->
                </div>
            </div>
            <!-- Footer Main End -->

            <!-- Footer CopyRight Start -->
            <div class="footer-copyright">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="text-center text-md-start">
                            <p>
                                &copy;
                                <span class="current-year"></span>
                                <span> NAVRANG </span> Made with
                                <i class="lastudioicon-heart-1"></i> by
                                <b>Blackpulse Media</b>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center text-md-end">
                            <img src="{{ url('public/assets/images/footer-payment-1.png') }}" alt="Footer Payment"
                                width="230" height="17" loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer CopyRight End -->
        </div>
    </footer>
    <!-- Footer End -->

    <div class="whatsapp">
        <a href="https://wa.me/917982083234" target="_blank">
            <img src="{{ url('public/assets/images/whatsapp.webp') }}" alt="Whatsapp">
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ url('public/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ url('public/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('public/assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('public/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ url('public/assets/js/nice-select2.js') }}"></script>

    <!-- Activation JS -->
    <script src="{{ url('public/assets/js/main.js') }}"></script>


</body>

</html>