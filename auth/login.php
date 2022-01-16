<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .zindex-modal{
            position: absolute;
            top:10px;
            z-index: 1055;
        }
    </style>

</head>
<?php

//ambil nilai variabel error
if (isset($_GET['returnmessage']))
{
   $returnMessage=$_GET['returnmessage'];
}
else
{
   $returnMessage="";
}
$message="";
if ($returnMessage=="wrong_captcha")
{
    $message="<div class='alert alert-warning alert-dismissible fade show mr-4 ml-4 row d-flex justify-content-between mb-4 zindex-modal' role='alert'>
    <div class='col-10'><strong>Sorry!</strong> Wrong Captcha.</div>
    <div class='col-1'><i class='fas fa-times pl-3' data-dismiss='alert' aria-label='Close'></i></div></div>";
}
if ($returnMessage=="wrong_credentials")
{
    $message="<div class='alert alert-danger alert-dismissible fade show mr-4 ml-4 row d-flex justify-content-between mb-4 zindex-modal' role='alert'>
    <div class='col-11'><strong>Sorry!</strong> Wrong Email or Password.</div>
    <div class='col-1'><i class='fas fa-times pl-3' data-dismiss='alert' aria-label='Close'></i></div></div>";
}
if ($returnMessage=="not_loggedin")
{
    $message="<div class='alert alert-warning alert-dismissible fade show mr-4 ml-4 row d-flex justify-content-between mb-4 zindex-modal' role='alert'>
    <div class='col-10'><strong>Sorry!</strong> Please Login First.</div>
    <div class='col-1'><i class='fas fa-times pl-3' data-dismiss='alert' aria-label='Close'></i></div></div>";
}
if ($returnMessage=="login_success")
{
    $message="<div class='alert alert-success alert-dismissible fade show mr-4 ml-4 row d-flex justify-content-between mb-4 zindex-modal' role='alert'>
    <div class='col-10'><strong>Yeay!</strong> Login Succes.</div>
    <div class='col-1'><i class='fas fa-times pl-3' data-dismiss='alert' aria-label='Close'></i></div></div>";
    header( 'refresh:0.8;url=../admin/index.php' );
}
if ($returnMessage=="logout_success")
{
    $message="<div class='alert alert-success alert-dismissible fade show mr-4 ml-4 row d-flex justify-content-between mb-4 zindex-modal' role='alert'>
    <div class='col-10'><strong>Yeay!</strong> Logout Succes.</div>
    <div class='col-1'><i class='fas fa-times pl-3' data-dismiss='alert' aria-label='Close'></i></div></div>";
}
?>
<body class="bg-gradient-secondary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
        <?php echo $message; ?>
            <div class="col-xl-5 col-lg-8 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="login_check.php">
                                        <div class="form-group">
                                        <input type="email" class="form-control"
                                                id="inputEmailAddress" name="inputEmailAddress" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                id="inputPassword" name="inputPassword" placeholder="Enter Password..." required>
                                        </div>
                                        <div class="form-group">
                                            <img src="captcha.php" alt="">
                                            <input type="" class="form-control"
                                                id="inputCaptcha" name="inputCaptcha" placeholder="Enter Captcha..." required>                                
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                                    </form>                                                     
                                </div>                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>