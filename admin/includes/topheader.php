            <head>
                <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
                <script src="assets/js/modernizr.min.js"></script>
            </head>
            <div class="topbar" style=" background: #003553">
                <!-- LOGO -->
                <div class="topbar-left" style="background: #003553;">
                    <a href="" class="logo" style="font-size:medium; font-weight: 500">
                        <img src="logo/<?= $company_logo ?>" alt="" height="50">
                        <span> <?= $company_name ?> </span>
                    </a>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                        </ul>
                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, Admin</h5>
                                    </li>
                                    <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul> <!-- end navbar-right -->
                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
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
            <script src="../plugins/switchery/switchery.min.js"></script>
            <!-- App js -->
            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>
            <!-- Counter js  -->
            <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
            <script src="../plugins/counterup/jquery.counterup.min.js"></script>
            <!--Morris Chart-->
            <script src="../plugins/morris/morris.min.js"></script>
            <script src="../plugins/raphael/raphael-min.js"></script>
            <!-- Dashboard init -->
            <script src="assets/pages/jquery.dashboard.js"></script>