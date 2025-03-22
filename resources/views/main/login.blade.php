@extends("main.include.layout")
@section("content")

<div class="bg-light">
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section" style="background-image: url(public/assets/images/blog-page-header.jpg);">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper breadcrumb-white text-center">
                <h2 class="breadcrumb-wrapper__title">
                    SignIn
                </h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="{{url('')}}">Home</a></li>
                    <li><span>SignIn</span></li>
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
                    <!-- Log In & Register Box Start -->
                    <div class="login-register">
                        <h3 class="login-register__title">Log In</h3>

                        <form action="" method="post" id="login">
                            <div class="login-register__form">
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input class="single-form__input" type="text" name="username" placeholder="Username or email address *">
                                    <div class="username_err error"></div>
                                </div>
                                <!-- Single Form Start -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input class="single-form__input" name="password" type="password" placeholder="Password *">
                                    <div class="password_err error"></div>
                                </div>
                                <!-- Single Form Start -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input class="single-form__input" type="checkbox" id="remember">
                                    <label for="remember" class="single-form__label checkbox-label"><span></span> Remember
                                        me</label>
                                    <p class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </p>
                                </div>
                                <!-- Single Form Start -->

                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <button class="single-form__btn btn" type="submit">
                                        Log In
                                    </button>
                                </div>
                                <!-- Single Form Start -->
                            </div>
                        </form>


                    </div>
                    <!-- Log In & Register Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Log In & Register End -->

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
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#login").submit(function(e) {
            e.preventDefault();
            var form = $("#login")[0];
            var data = new FormData(form);
            $("#submitBtn").prop("disabled", true);
            $.ajax({
                type: "POST",
                url: "{{route('loginProcess')}}",
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
                            window.location.href="{{route('my-account')}}";
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