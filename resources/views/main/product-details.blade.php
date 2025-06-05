@extends('main.include.layout')
@section('meta')
    @php
        echo $product->seo_tags;
    @endphp
@endsection
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
                            <h1 class="product-single-content__title">
                                {{ $product->product_title }}
                            </h1>
                            <div class="product-single-content__price-stock">
                                <div class="product-single-content__price">
                                    ₹
                                    @if (is_numeric($product->product_price) && is_numeric($product->product_discount_percentage))
                                        <span style="text-decoration: line-through;" class="text-danger">{{ $product->product_price }}</span>
                                        <span>{{ $product->product_price - ($product->product_price / 100 * $product->product_discount_percentage) }}</span>
                                    @else
                                        <span>{{ $product->product_price }}</span>
                                    @endif
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

                            @if ($product->stock == 0)
                                <div class="single-product__stock-status" style="color: red; font-weight: bold; margin-top: 40px; margin-bottom: 40px;">
                                    Out of Stock
                                </div>
                            @else
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
                                </div>
                            @endif

                            
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
                            </div>
                            <div class="button-02 d-inline-block">
                                <a href="#" data-product-id="{{ $product->product_id }}"
                                    class="requestBulkRate special-offer-content__btn">
                                    Bulk Rate Request
                                </a>
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
                            <button data-bs-toggle="pill" data-bs-target="#reviews" type="button">
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
                        <div class="tab-pane fade" id="reviews">
                            <!-- Product Single Review Start -->
                            <div class="product-single-review">
                                <!-- Product Comment Start -->
                                <div class="product-comment">
                                    <h3 class="comment-title">
                                        Product Reviews
                                    </h3>

                                    <!-- Comment Items Start -->
                                    <ul class="comment-items">
                                        @forelse($reviews as $review)
                                            <li class="comment-item">
                                                <div class="comment-item__author">
                                                    <img src="{{ url('public/assets/images/user.png') }}" alt="Author" width="90" height="90" loading="lazy" />
                                                </div>
                                                <div class="comment-item__content">
                                                    <div class="comment-item__rating">
                                                        <span class="star-rating">
                                                            <span style="width: {{ $review->rating * 20 }}%;"></span>
                                                        </span>
                                                    </div>
                                                    <p class="comment-item__description">
                                                        {{ $review->review }}
                                                    </p>
                                                    <p class="comment-item__meta">
                                                        <strong>{{ $review->name }}</strong> - {{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y') }}
                                                    </p>
                                                </div>
                                            </li>
                                        @empty
                                            <li>No reviews yet. Be the first to review this product!</li>
                                        @endforelse
                                    </ul>

                                    <!-- Comment Items End -->
                                </div>
                                <!-- Product Comment End -->

                                <!-- Product Comment Form Start -->
                                <div class="product-comment-form">
                                    <h3 class="comment-title">
                                        Add a review
                                    </h3>

                                    <form id="reviewForm" method="POST">
                                        @csrf
                                        <div class="comment-form">
                                            <div class="product-review-form__rating">
                                                <div class="label">Your rating *</div>
                                                <select name="rating" id="rating" class="single-form__input">
                                                    <option value="">Select rating</option>
                                                    <option value="1">★☆☆☆☆</option>
                                                    <option value="2">★★☆☆☆</option>
                                                    <option value="3">★★★☆☆</option>
                                                    <option value="4">★★★★☆</option>
                                                    <option value="5">★★★★★</option>
                                                </select>
                                                <div class="error rating_err"></div>
                                            </div>
                                    
                                            <div class="single-form">
                                                <label class="single-form__label">Your review *</label>
                                                <textarea class="single-form__input" name="review" id="review" ></textarea>
                                                <div class="error review_err"></div>
                                            </div>
                                    
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Name *</label>
                                                        <input type="text" name="name" id="name" class="single-form__input"  />
                                                        <div class="error name_err"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-form">
                                                        <label class="single-form__label">Email *</label>
                                                        <input type="email" name="email" id="email" class="single-form__input" />
                                                        <div class="error email_err"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    
                                            <div class="single-form">
                                                <button class="single-form__btn btn" type="submit">Submit</button>
                                            </div>
                                        </div>
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

                            @foreach ($suggestedProduct as $suggest)
                                <div class="swiper-slide" role="group" aria-label="Product">
                                    <!-- Single product Start -->
                                    <div class="single-product js-scroll ShortFadeInUp scrolled">
                                        <div class="single-product__thumbnail">
                                            @if (!empty($suggest->product_discount_percentage) && $suggest->product_discount_percentage != '0')
                                                <div class="single-product__thumbnail--badge onsale">
                                                    Sale {{ $suggest->product_discount_percentage }}% OFF
                                                </div>
                                            @endif
                                            <div class="single-product__thumbnail--holder">
                                                <a href="{{ url('product-details/' . $suggest->product_id) }}">
                                                    <img src="{{ url($suggest->product_image) }}"
                                                        alt="{{ $suggest->product_title }}" width="344"
                                                        height="370" loading="lazy">
                                                </a>
                                            </div>
                                            <div class="single-product__thumbnail--meta-2">
                                                <a href="#" class="add-to-cart"
                                                    data-product-id="{{ $suggest->product_id }}"
                                                    data-bs-tooltip="tooltip" data-bs-placement="top"
                                                    data-bs-title="Add to cart" data-bs-custom-class="p-meta-tooltip"
                                                    aria-label="cart"><i class="lastudioicon-shopping-cart-3"></i></a>
                                            </div>
                                        </div>
                                        <div class="single-product__info text-center">
                                            <div class="single-product__info--tags">
                                                <a href="#">{{ $suggest->category_name }}</a>
                                            </div>
                                            <h3 class="single-product__info--title">
                                                <a href="{{ url('product-details/' . $suggest->product_id) }}">
                                                    {{ Str::limit($suggest->product_title, 40) }}
                                                </a>
                                            </h3>
                                            <div class="single-product__info--price">
                                                ₹
                                                @if (is_numeric($suggest->product_price) && is_numeric($suggest->product_discount_percentage))
                                                    <span style="text-decoration: line-through;" class="text-danger">{{ $suggest->product_price }}</span>
                                                    <span>{{ $suggest->product_price - ($suggest->product_price / 100 * $suggest->product_discount_percentage) }}</span>
                                                @else
                                                    <span>{{ $suggest->product_price }}</span>
                                                @endif
                                            </div>
                                            
                                            
                                            @if ($suggest->stock == 0)
                                                <div class="single-product__stock-status" style="color: red; font-weight: bold; margin-top: 10px;">
                                                    Out of Stock
                                                </div>
                                            @else
                                                <a href="#" data-product-id="{{ $product->product_id }}"
                                                    class="add-to-cart special-offer-content__btn">
                                                    Add to cart
                                                </a>
                                            @endif
                                            
                                            
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
    </main>



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
        $(document).on('click', '.requestBulkRate', function(event) {
            event.preventDefault(); // Prevent default link behavior
            var productId = $(this).data('product-id');
            var quantity = 1;

            $("#requestBulkRateForm").modal("show");
            $("#product_id").val(productId);
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#bulkContactForm").submit(function(e) {
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
                    success: function(data) {
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
                    error: function(error) {
                        console.log(error.responseJSON);
                        $("#bulkformbtn").prop("disabled", false);
                    }
                })
            })
        })

        $("#reviewForm").submit(function(e) {
            e.preventDefault();
            clearError()
            var form = $("#reviewForm")[0];
            var data = new FormData(form);
        
            $.ajax({
                type: "POST",
                url: "{{ route('product.review.submit') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        }).then(() => {
                            form.reset();
                            clearError()
                        });
                    } else {
                        Swal.fire({
                            icon: data.status,
                            title: data.message
                        });
                        printError(data.errors);
                    }
                },
                error: function(error) {
                    console.log(error.responseJSON);
                }
            });
        });

        function clearError() {
            $('.error').text('')
        }

        function printError(err) {
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection
