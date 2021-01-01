<?php

session_start();
include '../db/db.php';

if (!isset($_SESSION['student_email'])) {
    header("Location: ../login.php");
    
}

$institute_id = $_SESSION['institute_id'] ;

//Get student First name
@$student_name = $_SESSION['student_name'];
$name = explode(' ',trim($student_name));
$student_first_name = $name[0]; 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Student - Smart Industrial Visit</title>
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
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Upcoming Visits</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- end page title end breadcrumb -->

                            <!--main content-->
                            <div class="row">
        <?php
            
            $get_packages = "SELECT * FROM `package` WHERE `package_for_institute_id` = '$institute_id' ";
            $run_get_packages = mysqli_query($con, $get_packages);
            while($packages = mysqli_fetch_assoc($run_get_packages)){
                echo '
                <div class="col-md-12 col-xl-4">
                <div class="card m-b-30 ">
                    <div class="card-body">
                        <h5 class="header-title mt-0 pb-3"> '.$packages['package_name'].' </h5>
                        <div>
                            <p>'.$packages['package_description'].'</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class> ₹'.$packages['price'].' <h5>
                            <a class="btn btn-primary" href=package_details.php?d='.$packages['package_id'].'>View Details </a>
                        </div>
                        
                    </div>
                </div>
                </div>

                ';
            }
        
        ?>


                                
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
       
    </body>

</html>