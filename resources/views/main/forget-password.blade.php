@extends("main.include.layout")
@section('meta')
    @php
        echo $meta->head_scripts;
    @endphp
    <title>User Login - Navrangaroma Candles</title>
@endsection
@section("content")

    <div class="bg-light">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-section" style="background-image: url(public/assets/images/blog-page-header.jpg);">
            <div class="container-fluid custom-container">
                <div class="breadcrumb-wrapper breadcrumb-white text-center">
                    <h2 class="breadcrumb-wrapper__title">
                        Forget Password
                    </h2>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="{{url('')}}">Home</a></li>
                        <li><span>Forget Password</span></li>
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
                            <h3 class="login-register__title">Recover Your Password</h3>

                            <form action="" method="post" id="forgetPassword">
                                @csrf
                                <div class="login-register__form">
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <input class="single-form__input" name="username" type="text"
                                            placeholder="Email or Username *">
                                        <div class="email_err error"></div>
                                    </div>
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <p>
                                            Remember you password ? <a href="#" class="text-primary">Log In</a>
                                        </p>
                                    </div>
                                    <!-- Single Form Start -->
                                    <div class="single-form">
                                        <button class="single-form__btn btn" type="submit">
                                            Search
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
    </div>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#forgetPassword").submit(function (e) {
                e.preventDefault();
                var form = $("#forgetPassword")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{ route('process.forgetPassword') }}",
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
                                window.location.href = "{{route('login')}}";
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