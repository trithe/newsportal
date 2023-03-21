<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {
    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        $_SESSION['login'] = $_POST['username'];
        $_SESSION['utype'] = $num['type'];
        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else {
        $msg = "Authentication Failed";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $company_name ?>.">
    <meta name="author" content="<?= $company_name ?>">
    <!-- App title -->
    <title><?= $company_name ?> | Admin Panel</title>
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/login.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/modernizr.min.js"></script>
</head>
<style>
    .btn {
        display: inline-block;
        padding: 0.6rem 1rem;
        border: 0.2rem solid var(--darkblue);
        /* color: rgb(8, 219, 40); */
        color: var(--darkblue);
        cursor: pointer;
        font-size: 1.5rem;
        border-radius: 0.5rem;
        position: relative;
        overflow: hidden;
        z-index: 0;
        margin-top: 1rem;
        background-color: #fff;
    }

    .btn::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0%;
        height: 100%;
        background: var(--darkblue);
        transition: 0.3s linear;
        z-index: -1;
    }

    .btn:hover::before {
        width: 100%;
        left: 0;
    }

    .btn:hover {
        color: #fff;
    }
</style>

<body>
    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="m-t-40 account-pages">
                            <div class="text-center" style="padding-top: 30px;">
                                <h2 class="text-uppercase">
                                    <a href="index.html">
                                        <span><img src="logo/<?= $company_logo ?>" alt="" height="86"></span>
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <label>Username:</label>
                                            <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <a href="forgot-password.php"><i class="mdi mdi-lock"></i> Forgot your password?</a> -->
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <label>Password:</label>
                                            <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <button class="btn" style="width: 100%;" type="submit" name="login">Login</button>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <?php
                                    if (isset($msg)) {
                                    ?>
                                        <div>
                                            <p style="color: red;"><?= $msg ?></p>
                                        </div>
                                    <?php }
                                    ?>
                                </form>
                                <div class="clearfix"></div>
                                <a href="../index.php"><i class="mdi mdi-home"></i> Back Home</a>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>
                    <!-- end wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
</body>

</html>