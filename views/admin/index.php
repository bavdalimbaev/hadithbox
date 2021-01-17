<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>
    <link href="/use/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="/use/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-6 col-md-8">

            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    </div>
                    <form class="user" method="POST">
                        <input type="text" hidden name="check" value="<?php echo $_SESSION['CSRF']; ?>"/>
                        <div class="form-group">
                            <input name="login" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                        </div>
                        <div class="form-group">
                            <input name="password" required type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                        </div>
                        <input name="authUser" value="Login" type="submit" class="btn btn-primary btn-user btn-block">
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="register.html">Create an Account!</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<script src="/use/assets/vendor/jquery/jquery.min.js"></script>
<script src="/use/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/use/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/use/assets/js/sb-admin-2.min.js"></script>

</body>
</html>
