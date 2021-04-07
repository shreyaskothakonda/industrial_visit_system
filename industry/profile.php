<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['industry_email'])) {
    @$msg = $_SESSION['msg'] ;
    @$industry_name = $_SESSION['industry_name'] ;
<<<<<<< HEAD
=======
    @$industry_id = $_SESSION['industry_id'] ;
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3
}
else{
    header("Location: login.php");
}

<<<<<<< HEAD
@$industry_id = $_SESSION['industry_id'] ;

$get_industry_details = "SELECT * FROM `industry` WHERE `industry_id` = '$industry_id'";
$run_get_industry_details = mysqli_query($con, $get_industry_details);
$industry_data = mysqli_fetch_assoc($run_get_industry_details);

=======
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Industry - Smart Industrial Visit</title>
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

                            <!-- end page title end breadcrumb -->

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
                                                <td><?php echo $industry_data['industry_name']?></td>
                                                </tr>

                                                <tr>
                                                <td>Email</td>
                                                <td><?php echo $_SESSION['industry_email']?></td>
                                                </tr>

                                                <tr>
                                                <td>Website</td>
                                                <td><?php echo $industry_data['industry_website']?></td>
                                                </tr>

                                                <tr>
                                                <td>Address</td>
                                                <td><?php echo $industry_data['industry_address']?></td>
                                                </tr> 

                                                <tr>
                                                <td>City, State</td>
                                                <td><?php echo $industry_data['industry_city'].", ".$industry_data['industry_state']?></td>
                                                </tr> 
                                            
                                            </tbody>
                                        </table>
                                        
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--/main-content-->
=======
                            <!--main content-->
                            <div class="row">
                                
                            </div>
                            <!--main content-->
>>>>>>> 597d7f52ca68c89d205530794a5505b6bb1fbbb3
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