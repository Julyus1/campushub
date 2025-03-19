<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CampusHub - Sign In</title>

    <!-- Custom fonts for this template-->
    @vite('public/vendor/fontawesome-free/css/all.min.css')

    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')
    <link rel="icon" href="{{ asset('img/ch-logo.png') }}" type="image/png" />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome! - Sign In as?</h1>
                            </div>
                            <form class="user">
                                <a href="login.php" class="btn btn-primary btn-user btn-block">
                                    Student
                                </a>
                                <a href="login.php" class="btn btn-primary btn-user btn-block">
                                    Employee
                                </a>
                                <a href="login.php" class="btn btn-primary btn-user btn-block">
                                    Administrator
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    @vite('resources/js/jquery.min.js')
    @vite('resources/js/bootstrap.bundle.min.js')
    @vite('resources/js/jquery.easing.min.js')
    @vite('resources/js/sb-admin-2.min.js')

</body>

</html>