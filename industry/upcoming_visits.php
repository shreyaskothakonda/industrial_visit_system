<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['industry_email'])) {
    @$msg = $_SESSION['msg'] ;
    @$industry_name = $_SESSION['industry_name'] ;
    @$industry_id = $_SESSION['industry_id'] ;
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
        <title>Industry - Smart Industrial Visit</title>
        <?php include 'components/stylesheets.php' ?>
        <!-- DataTables -->
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                        <h4 class="page-title">Upcoming Visits</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <!-- end page title end breadcrumb -->

                            <!--end row-->

                            <!--main content-->
                            
                            <div class="row">
                            <div class="col-12 ">
                                <div class="card m-b-30">
                                    <div class="card-body">            
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                <th scope="col">From Institute</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">No. of Students</th>
                                                <th scope="col">No. of Faculties</th>
                                                <th scope="col">No. of Faculties</th>
                                                <th scope="col">Date of Visit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $get_requests_list = "SELECT * FROM `requests` WHERE `request_to_industry_id` = '$industry_id' AND `request_status` = '1' " ;
                                            $result_requests = mysqli_query($con, $get_requests_list);
                                            while($list_request = mysqli_fetch_assoc($result_requests))
                                            {
                                                echo "
                                                <td>".$list_request['request_from_institute_name']."</td>
                                                <td>".$list_request['institute_phone_number']."</td>
                                                <td>".$list_request['number_of_students']."</td>
                                                <td>".$list_request['number_of_faculties']."</td>
                                                <td>".$list_request['number_of_days']."</td>
                                                <td>".$list_request['date_of_visit']."</td>
                                                "; 
                                                    
                                            }

                                            ?>
                                            </tbody>
                                        </table>            
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            </div>
                            <!-- main content -->

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
        <!-- Required datatable js -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
        <!-- Datatable init js -->
        <script src="../assets/pages/datatables.init.js"></script>
       
    </body>

</html>