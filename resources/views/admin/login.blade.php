<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navrang Admin - Login</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{url('public/admin_assets/plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{url('public/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('public/admin_assets/dist/css/adminlte.min2167.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{url('public/admin_assets/dist/css/style.css')}}">

    
    <link href="{{url('public/admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}" rel="stylesheet">
    

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline-brown">
            <div class="card-header text-center bg-dark py-2 bg-cream">
                <a href="index.php" class="h1"><img src="{{url('public/assets/images/logo.png')}}" width="200" alt="Logo"></a>
            </div>
            <div class="card-body">
                <h2 class="text-center"><b>Navrang </b>Dashboard</h2>
                <form action="" method="post" id="login">
                    <p class="success_msg success"></p>
                    <p class="error_msg error"></p>
                    @csrf
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="username_err error"></div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="input-group">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="password_err error"></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-brown btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>

    </div>


    <script src="{{url('public/admin_assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('public/admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/admin_assets/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>
    <script src="{{url('public/admin_assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $("#login").submit(function (e) {
                e.preventDefault();
                var form = $("#login")[0];
                var data = new FormData(form);
                $("#submitBtn").prop("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "{{Route('admin.VerifyLogin')}}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        //alert(data.status);
                        //console.log(data)
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: data.status,
                                title: data.message
                            }).then(() => {
                                window.location.reload();
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

</body>

</html>