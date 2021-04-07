<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['institute_email'])) {
    @$msg = $_SESSION['msg'] ;

<<<<<<< HEAD
    //Get Institute name
=======
    //Get student First name
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3
    @$institute_name = $_SESSION['institute_name'];
}
else{
    header("Location: login.php");
}

<<<<<<< HEAD
$institute_email = $_SESSION['institute_email'] ;

$get_institute_data = "SELECT * FROM `institute` WHERE `institute_email` = '$institute_email'" ;
$run_get_institute_data  = mysqli_query($con, $get_institute_data);
$institute_data = mysqli_fetch_assoc($run_get_institute_data) ;

=======
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3
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
                                        <h4 class="page-title">Profile</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

<<<<<<< HEAD
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
                                                <td><?php echo $institute_data['institute_name']?></td>
                                                </tr>

                                                <tr>
                                                <td>Email</td>
                                                <td><?php echo $_SESSION['institute_email']?></td>
                                                </tr>

                                                <tr>
                                                <td>Website</td>
                                                <td><?php echo $institute_data['institute_website']?></td>
                                                </tr>

                                                <tr>
                                                <td>Address</td>
                                                <td><?php echo $institute_data['institute_address']?></td>
                                                </tr> 

                                                <tr>
                                                <td>City, State</td>
                                                <td><?php echo $institute_data['institute_city'].", ".$institute_data['institute_state']?></td>
                                                </tr> 
                                            
                                            </tbody>
                                        </table>
                                        
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--/main-content-->
=======
                            <!-- end page title end breadcrumb -->
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3

                            <!--end row-->

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