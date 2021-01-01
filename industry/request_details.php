<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['industry_email'])) {
    @$msg = $_SESSION['msg'] ;
    @$industry_name = $_SESSION['industry_name'] ;
    @$industry_id = $_SESSION['industry_id'] ;
    @$request_id = $_GET['d'] ;
    $_SESSION['request_id'] = $request_id;
    
}
else{
    header("Location: login.php");
}

                            
$get_requests_list = "SELECT * FROM `requests` WHERE `request_to_industry_id` = '$industry_id' AND `request_id` = '$request_id' LIMIT 1" ;
$result_requests = mysqli_query($con, $get_requests_list);
$list_request = mysqli_fetch_assoc($result_requests) ;

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
                                        <h4 class="page-title">Request Details for <?php echo $list_request['request_from_institute_name'] ?></h4>
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
                                                <td>From Institute</td>
                                                <td>".$list_request['request_from_institute_name']."</td>
                                                </tr>

                                                <tr>
                                                <td>Phone Number</td>
                                                <td>".$list_request['institute_phone_number']."</td>
                                                </tr>

                                                <tr>
                                                <td>Number of Students</td>
                                                <td>".$list_request['number_of_students']."</td>
                                                </tr>

                                                <tr>
                                                <td>Number of Faculties</td>
                                                <td>".$list_request['number_of_faculties']."</td>
                                                </tr>

                                                <tr>
                                                <td>Number of Days</td>
                                                <td>".$list_request['number_of_days']."</td>
                                                </tr>

                                                <tr>
                                                <td>Date of Visit</td>
                                                <td>".$list_request['date_of_visit']."</td>
                                                </tr>

                                                <tr>
                                                <td>Date of Request</td>
                                                <td>".$list_request['date_of_request']."</td>
                                                </tr>

                                                <tr>
                                                <td>Subject</td>
                                                <td>".$list_request['subject']."</td>
                                                </tr>

                                                <tr>
                                                <td>Message</td>
                                                <td>".$list_request['message']."</td>
                                                </tr>

                                                ";

                                            ?>
                                            </tbody>
                                        </table>

                                        <?php 
        
                                        if($list_request['request_status'] == '0'){
                                            echo '
                                            <div class="col mt-5 d-flex align-items-start">
                                            <form action="functions/accept_request.php" method="post">
                                                <input type="hidden" name="accept" value="accept">
                                                <button type="submit" class="btn btn-success btn-raised mr-2"> Accept </button>
                                            </form>

                                            <form action="functions/reject_action.php" method="post">
                                                <input type="hidden" name="reject" value="reject">
                                                <button type="submit" class="btn btn-danger btn-raised mr-2"> Reject </button>
                                            </form> 
                                            </div>
                                            
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
        <?php 
        
        if($list_request == NULL){
            echo "
            <script>
                alert('Error getting details!');
            </script>
            
            ";

            header('Location: requests.php');
        }
        
        ?>
        
       
    </body>

</html>