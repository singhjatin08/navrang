@extends('main.include.layout')
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>Contact -Navrangaroma Candles</title>
@endsection
@section('content')
    <div>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper text-center">
                    <h2 class="breadcrumb-wrapper__title">Contact Us</h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Contact Us</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Contact Us Start -->
        <div class="contact-us-section bg-light section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Contact Us Wrapper Start -->
                <div class="contact-us-wrapper">
                    <div class="row gy-5">
                        <div class="col-md-8">
                            <!-- Contact Us Start -->
                            <div class="contact-us">
                                <h2 class="contact-us__title">
                                    Contact us for any questions
                                </h2>

                                <!-- Contact Us Form Start -->
                                <div class="contact-us-form">
                                    <form action="" method="post" id="contactForm">
                                        @csrf
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Name*</label>
                                            <input class="single-form__input" name="name" type="text" />
                                            <span class="name_err error"></span>
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Email*</label>
                                            <input class="single-form__input" name="email" type="email" />
                                            <span class="email_err error"></span>
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">Phone Number*</label>
                                            <input class="single-form__input" name="phone" minlength="10" maxlength="14"
                                                type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                            <span class="phone_err error"></span>
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <label class="single-form__label">How can we help?</label>
                                            <textarea class="single-form__input" name="message"></textarea>
                                            <span class="message_err error"></span>
                                        </div>
                                        <!-- Single Form Start -->
                                        <!-- Single Form Start -->
                                        <div class="single-form">
                                            <button class="single-form__btn btn" type="submit">
                                                Send Message
                                            </button>
                                        </div>
                                        <!-- Single Form Start -->
                                    </form>
                                </div>
                                <!-- Contact Us Form End -->
                            </div>
                            <!-- Contact Us End -->
                        </div>
                        <div class="col-md-4">
                            <!-- Contact Us Start -->
                            <div class="contact-us">
                                <h2 class="contact-us__title">
                                    Contact info
                                </h2>

                                <!-- Contact Us Info Start -->
                                <div class="contact-us-info">
                                    <!-- Contact Us Info Start -->
                                    <div class="contact-info-item">
                                        <div class="contact-info-item__service">
                                            <h4 class="contact-info-item__service--title">
                                                Call Us On
                                            </h4>
                                            <p>
                                                <a href="tel:+91 7982083234">+91 7982083234</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- Contact Us Info End -->
                                    <!-- Contact Us Info Start -->
                                    <div class="contact-info-item">
                                        <h4 class="contact-info-item__title">
                                            Email to Us
                                        </h4>
                                        <p>
                                            <a href="mailto:info@navrangaromacandles.com">info@navrangaromacandles.com</a>
                                        </p>
                                    </div>
                                    <!-- Contact Us Info End -->
                                    <!-- Contact Us Info Start -->
                                    <div class="contact-info-item">
                                        <h4 class="contact-info-item__title">
                                            Find Us
                                        </h4>
                                        <p>
                                            69/6A NAJAFGARH INDUSTRIAL AREA RAMA
                                            RAMA ROAD PANDIT JI POORI WALA.
                                        </p>
                                    </div>
                                    <!-- Contact Us Info End -->
                                </div>
                                <!-- Contact Us Info End -->
                            </div>
                            <!-- Contact Us End -->
                        </div>
                    </div>
                </div>
                <!-- Contact Us Wrapper End -->
            </div>
        </div>
        <!-- Contact Us End -->

         
    </div>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#contactForm").submit(function (e) {
                e.preventDefault();
                var form = $("#contactForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('sendEnquiry') }}",
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
                    error: function (error) {
                        console.log(error.responseJSON);
                        $("#submitBtn").prop("disabled", false);
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