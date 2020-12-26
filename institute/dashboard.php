<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['institute_email'])) {
    @$msg = $_SESSION['msg'] ;

    //Get student First name
    @$institute_name = $_SESSION['institute_name'];
}
else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Institute - Smart Industrial Visit</title>
        <?php include 'components/stylesheets.php' ?>

    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <?php include 'components/left_sidebar.php' ?>

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <?php include 'components/topbar.php' ?>

                    <div class="page-content-wrapper dashborad-v">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Dashboard</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- end page title end breadcrumb -->
                            
                            <div class="row">
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-info m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-account-multiple-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 text-center ml-auto align-self-center">
                                                    <div class="m-l-10 text-white float-right">
                                                        <h5 class="mt-0 round-inner">562</h5>
                                                        <p class="mb-0 ">Registered Students</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-success m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round ">
                                                        <i class="mdi mdi-basket"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ml-auto align-self-center text-center">
                                                    <div class="m-l-10 text-white float-right">
                                                        <h5 class="mt-0 round-inner">7514</h5>
                                                        <p class="mb-0 ">New Orders</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card bg-primary m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-calculator"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ml-auto align-self-center text-center">
                                                    <div class="m-l-10 text-white float-right">
                                                        <h5 class="mt-0 round-inner">$32874</h5>
                                                        <p class="mb-0">Total Sales</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-xl-3">
                                    <div class="card m-b-30 border-0">

                                        <div class="card-body  text-center">
                                            <p> Institute with most number of visits </p>

                                            <div class="text-center">
                                                <h5>Institute Name</h5>
                                            </div>

                                            <h5>100</h5>
                                            <p>Number of Visits</p>

                                            <a href="" class="btn btn-block btn-raised btn-info my-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-xl-3">
                                    <div class="card m-b-30 border-0">

                                        <div class="card-body  text-center">
                                            <p> Most Visited Industry </p>

                                            <div class="text-center">
                                                <h5>Industry Name</h5>
                                            </div>

                                            <h5>100</h5>
                                            <p>Number of Visits</p>

                                            <a href="" class="btn btn-block btn-raised btn-info my-3">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                        <!-- container -->

                    </div>
                    <!-- Page content Wrapper -->
                </div>
                <!-- content -->

                <footer class="footer">
                    © 2020 Smart Industrial Visit.
                </footer>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <?php include 'components/scripts.php' ?>
        <script src="../assets/plugins/fullcalendar/vanillaCalendar.js"></script>
       
    </body>

</html>