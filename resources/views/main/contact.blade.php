@extends('main/include/layout')
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
        <div class="contact-us-section section-padding-2">
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
                                        <h4 class="contact-info-item__title">
                                            Call to Us:
                                        </h4>
                                        <p>
                                            We’re available from 10 am – 10
                                            pm EST, 7 days a week.
                                        </p>

                                        <div class="contact-info-item__service">
                                            <h4 class="contact-info-item__service--title">
                                                Customer Service
                                            </h4>
                                            <p>
                                                <a href="tel:323658-5994">(323)658-5994</a>
                                                <a href="tel:928636-5472">(928)636-5472</a>
                                            </p>
                                        </div>
                                        <div class="contact-info-item__service">
                                            <h4 class="contact-info-item__service--title">
                                                Technical Service
                                            </h4>
                                            <p>
                                                <a href="tel:504541-8983">(504)541-8983</a>
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
                                            <a href="mailto:aaron.lynch@mail.com">aaron.lynch@mail.com</a>
                                        </p>
                                    </div>
                                    <!-- Contact Us Info End -->
                                    <!-- Contact Us Info Start -->
                                    <div class="contact-info-item">
                                        <h4 class="contact-info-item__title">
                                            Find Us
                                        </h4>
                                        <p>
                                            121 King Street, Melbourne
                                            <br />
                                            Victoria 3000 Australia
                                        </p>
                                        <a href="#" class="contact-info-item__direction">Get Direction</a>
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
                            <input type="text" placeholder="Enter your email address..." />
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#contactForm").submit(function(e) {
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
                    success: function(data) {
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
                    error: function(error) {
                        console.log(error.responseJSON);
                        $("#submitBtn").prop("disabled", false);
                    }
                })
            })
        })



        function printError(err) {
            $.each(err, function(key, value) {
                $("." + key + "_err").text(value)
            })
        }
    </script>
@endsection
