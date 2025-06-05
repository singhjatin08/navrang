@extends("main.include.layout")
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>User Register - Navrangaroma Candles</title>
@endsection
@section("content")


    <div class="bg-light">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section" style="background-image: url(public/assets/images/blog-page-header.jpg);">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper breadcrumb-white text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        SignUp
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>SignUp</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Log In & Register Start -->
        <div class="login-register-section section-padding-1 section-padding-2">
            <div class="container-fluid custom-container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="login-register">
                            <h3 class="login-register__title">Signup</h3>

                            <form action="{{route('signupProcess')}}" method="post" id="signupForm">
                                @csrf
                                <div class="login-register__form">
                                    <div class="single-form">
                                        <input class="single-form__input" type="text" name="name" placeholder="Full Name *">
                                        <div class="name_err error"></div>
                                    </div>
                                    <div class="single-form">
                                        <input class="single-form__input" name="phone" minlength="10" maxlength="14"
                                            type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            placeholder="Phone Number *">
                                        <div class="phone_err error"></div>
                                    </div>
                                    <div class="single-form">
                                        <input class="single-form__input" type="email" name="email"
                                            placeholder="Email address *">
                                        <div class="email_err error"></div>
                                    </div>
                                    <div class="single-form">
                                        <input class="single-form__input" type="password" name="password"
                                            placeholder="Password *">
                                        <div class="password_err error"></div>
                                    </div>
                                    <div class="single-form">
                                        <p class="privacy-policy-text">
                                            Your personal data will be used
                                            to support your experience
                                            throughout this website, to
                                            manage access to your account,
                                            and for other purposes described
                                            in our
                                            <a href="#">privacy policy</a>.
                                        </p>
                                    </div>
                                    <div class="single-form">
                                        <button type="submit" id="submitBtn" class="single-form__btn btn">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="newsletter-section">
            <div class="newsletter-left" style="background-image: url(public/assets/images/newsletter-bg-1.jpg)">
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
            </div>
            <div class="newsletter-right" style="background-image: url(public/assets/images/newsletter-bg-2.jpg)">
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
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#signupForm").submit(function (e) {
                e.preventDefault();
                var form = $("#signupForm")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disable", true);
                $.ajax({
                    url: "{{route('signupProcess')}}",
                    method: "post",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log(data)
                        if (data.status == "success") {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                window.location.href = "{{url('')}}";
                            });
                            form.reset();
                        } else {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            })
                            printError(data.error)
                            $("#submitBtn").prop("disabled", false);
                        }
                    },
                    error: function (err) {
                        console.log(error.responseJSON);
                        $("#submitBtn").prop("disabled", false);
                    }
                })

            })

            function printError(err) {
                $.each(err, function (key, value) {
                    $("." + key + "_err").text(value)
                })
            }
        })
    </script>



@endsection