<?php

session_start();
include '../db/db.php';

if (!isset($_SESSION['student_email'])) {
	header("Location: ../login.php");
}

$student_email = $_SESSION['student_email'];

//Get student First name
@$student_name = $_SESSION['student_name'];
$name = explode(' ',trim($student_name));
$student_first_name = $name[0]; 


$get_student_details = "SELECT * FROM student WHERE `student_email` = '$student_email' LIMIT 1" ;
$run_get_student_details = mysqli_query($con, $get_student_details) ;
$student_data = mysqli_fetch_array($run_get_student_details);

$institute_id = $_SESSION['institute_id'] ;


$get_institute_name = "SELECT `institute_name` FROM `institute` WHERE `institute_id` = '$institute_id' LIMIT 1"; 
$run_get_institute_name = mysqli_query($con, $get_institute_name);
$institute_data = mysqli_fetch_assoc($run_get_institute_name) ;

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
                                        <h4 class="page-title">Student Profile</h4>
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
                                                <tr>
                                                <td>Name</td>
                                                <td><?php echo $student_data['student_name']?></td>
                                                </tr>

                                                <tr>
                                                <td>Email</td>
                                                <td><?php echo $_SESSION['student_email']?></td>
                                                </tr>

                                                <tr>
                                                <td>Institute</td>
                                                <td><?php echo $institute_data['institute_name']?></td>
                                                </tr>

                                                <tr>
                                                <td>Phone Number</td>
                                                <td><?php echo $student_data['phone_number']?></td>
                                                </tr>                                               

                                            
                                            </tbody>
                                        </table>
                                        
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