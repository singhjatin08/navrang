@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>Bulk Rates - Navrangaroma Candles</title>
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

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Bulk Rates
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>Bulk Rates</span></li>
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
                                        @if (!empty($product->product_sale_price))
                                            <div class="single-product__thumbnail--badge onsale">
                                                Sale
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

                                        {{-- <div class="single-product__info--rating">
                                            <span class="star-rating">
                                                <span style="width: 80%">
                                                </span>
                                            </span>
                                        </div> --}}
                                        <div class="button-02">
                                            <a href="#" data-product-id="{{ $product->product_id }}"
                                                class="requestBulkRate special-offer-content__btn">
                                                Enquire Now
                                            </a>
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
                                    <a href="{{ $url }}" class="{{ $page == $products->currentPage() ? 'active' : '' }}">
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

    </div>

    <div class="modal fade" id="requestBulkRateForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Request for Bulk-Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="bulkContactForm">
                    @csrf
                    <!-- Single Form Start -->
                    <input type="hidden" name="product_id" id="product_id" value="" />
                    <div class="single-form">
                        <label class="single-form__label">Name*</label>
                        <input class="single-form__input" name="name" type="text" />
                        <span class="name_err error"></span>
                    </div>
                    <!-- Single Form Start -->
                    <!-- Single Form Start -->
                    <div class="single-form">
                        <label class="single-form__label">Phone Number*</label>
                        <input class="single-form__input" name="phone" minlength="10" maxlength="14" type="text"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                        <span class="phone_err error"></span>
                    </div>
                    <!-- Single Form Start -->
                    <!-- Single Form Start -->
                    <div class="single-form">
                        <label class="single-form__label">Quantity*</label>
                        <input class="single-form__input" name="quantity" type="number" />
                        <span class="quantity_err error"></span>
                    </div>
                    <!-- Single Form Start -->


                    <!-- Single Form Start -->
                    <div class="single-form">
                        <button class="single-form__btn btn" id="bulkformbtn" type="submit">
                            Send Message
                        </button>
                    </div>
                    <!-- Single Form Start -->
                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.requestBulkRate', function (event) {
            event.preventDefault(); // Prevent default link behavior
            var productId = $(this).data('product-id');
            var quantity = 1;

            $("#requestBulkRateForm").modal("show");
            $("#product_id").val(productId);
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#bulkContactForm").submit(function (e) {
                e.preventDefault();
                var form = $("#bulkContactForm")[0];
                var data = new FormData(form);
                $("#bulkformbtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('sendBulkRateEnquiry') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        //alert(data.status);
                        console.log(data)
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                // window.location.href = "{{ route('home') }}";
                            });
                            $("#requestBulkRateForm").modal("hide");
                        } else {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                            printError(data.error)
                        }
                        form.reset();
                        $("#bulkformbtn").prop("disabled", false);
                    },
                    error: function (error) {
                        console.log(error.responseJSON);
                        $("#bulkformbtn").prop("disabled", false);
                    }
                })
            })
        })



        function printError(err) {
            $.each(err, function (key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection