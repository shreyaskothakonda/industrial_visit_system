<?php

session_start();
include '../db/db.php';

if (!isset($_SESSION['student_email'])) {
	header("Location: ../login.php");
}

//Get student First name
@$student_name = $_SESSION['student_name'];
$name = explode(' ',trim($student_name));
$student_first_name = $name[0]; 

@$package_id = $_GET['d'] ;
$_SESSION['package_id'] = $package_id;

$institute_id = $_SESSION['institute_id'] ;

$get_package_list = "SELECT * FROM `package` WHERE `package_for_institute_id` = '$institute_id' AND `package_id` = '$package_id' LIMIT 1" ;
$result_package = mysqli_query($con, $get_package_list);
$list_package = mysqli_fetch_assoc($result_package) ;

$package_for_request_id = $list_package['package_for_request_id'];

$get_requests_list = "SELECT * FROM `requests` WHERE `request_from_institute_id` = '$institute_id' AND `request_id` = '$package_for_request_id' LIMIT 1" ;
$result_requests = mysqli_query($con, $get_requests_list);
$list_request = mysqli_fetch_assoc($result_requests) ;

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
                                        <h4 class="page-title">Package Details</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- end page title end breadcrumb -->

                            <!--main-content-->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            
                                               echo "
                                                <tr>
                                                <td>Package Name</td>
                                                <td>".$list_package['package_name']."</td>
                                                </tr>

                                                <tr>
                                                <td>Description</td>
                                                <td>".$list_package['package_description']."</td>
                                                </tr>

                                                <tr>
                                                <td>Industry Name</td>
                                                <td>".$list_request['request_to_industry_name']."</td>
                                                </tr>

                                                <tr>
                                                <td>Address</td>
                                                <td>".$list_package['address']."</td>
                                                </tr>
                                                
                                                <tr>
                                                <td>Date of Visit</td>
                                                <td>".$list_request['date_of_visit']."</td>
                                                </tr>

                                                <tr>
                                                <td>Number of Days</td>
                                                <td>".$list_request['number_of_days']."</td>
                                                </tr>

                                                <tr>
                                                <td>Number of Faculties</td>
                                                <td>".$list_request['number_of_faculties']."</td>
                                                </tr>

                                                <tr>
                                                <td>Instructions</td>
                                                <td>".$list_package['instructions']."</td>
                                                </tr>

                                                <tr>
                                                <td>Price</td>
                                                <td>".$list_package['price']."</td>
                                                </tr>

                                                ";

                                            ?>
                                            </tbody>
                                        </table>

                                        <?php 
        
                                        if($list_package['price'] != ''){
                                            echo '
                                            <div class="col mt-5 d-flex align-items-start">
                                            <form action="functions/payment.php" method="post">
                                                <input type="hidden" name="pay" value="accept">
                                                <button type="submit" class="btn btn-success btn-raised mr-2 btn-lg"> Pay </button>
                                            </form>
                                            
                                            ';

                                            
                                        }
                                        
                                        ?>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/main-content-->
                           

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