<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['institute_email'])) {
    @$msg = $_SESSION['msg'] ;

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

        <script>
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
        </script>

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
                                        <h4 class="page-title">Plan a Visit</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->

                            <!--Main Content-->

                            <div class="row">
                                <div class="col-md-8 col-xl-8">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">Send Industrial Visit Request
                                            </h4>
                                            <div class="general-label">
                                                <form class="mb-0" action="functions/request_visit_action.php" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="bmd-label-floating ">Insititute Name</label>
                                                        <input type="text" class="form-control"
                                                        value="<?php echo $_SESSION['institute_name'] ?>"
                                                        name="institute_name"> 
                                                    </div> 

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="bmd-label-floating ">Institute Email address</label>
                                                        <input type="email" class="form-control"
                                                        value="<?php echo $_SESSION['institute_email'] ?>"
                                                        name="institute_email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="bmd-label-floating ">Institute Phone Number</label>
                                                        <input class="form-control" type="text" onkeypress="return isNumberKey(event)" maxlength="10"
                                                        minlength="8"  name="institute_phone_number" required> 
                                                    </div>

                                                    <div class="form-group">
                                                        <select name="industry_id" id="industry_id" class="form-control select2 form-control mb-3 custom-select">
                                                            <option selected disabled >Select Industry</option>
                                                                <?php 

                                                                $get_industry_list = "SELECT * FROM `industry`" ; 
                                                                $result = mysqli_query($con, $get_industry_list);
                                                                while($list = mysqli_fetch_assoc($result))
                                                                {
                                                                echo "<option value=".$list['industry_id']." > ".$list['industry_name']." - ".$list['industry_city']." - ".$list['industry_state']." </option>";

                                                                }

                                                                ?>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group pt-0 col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="bmd-label-floating ">Number of Students</label>
                                                                <input class="form-control" type="text" onkeypress="return isNumberKey(event)"   name="number_of_students" required> 
                                                            </div>
                                                        </div>

                                                        <div class="form-group pt-0 col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="bmd-label-floating ">Number of Faculties</label>
                                                                <input class="form-control" type="text" onkeypress="return isNumberKey(event)"   name="number_of_faculties" required> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-material bootstrap-select-1">  
                                                        <div class="form-group pt-0 col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1" class="bmd-label-floating ">Number of Days</label>
                                                                <input class="form-control" type="text" onkeypress="return isNumberKey(event)"   name="number_of_days" required> 
                                                            </div>
                                                        </div>

                                                        <div class="form-group pt-0 col">
                                                            <h6 class="text-muted">Visit Date</h6>
                                                            <input type="date" class="form-control" placeholder="" id="min-date" placeholder="Visit Date"
                                                            name="date_of_visit"> 
                                                        </div>
                                                    </div>

                                                    <div class="m-t-20 mt-5">
                                                        <h6 class="text-muted">Subject</h6>
                                                        <textarea id="textarea" class="form-control" maxlength="125" rows="3" placeholder=""
                                                        name="subject"></textarea>
                                                    </div>

                                                    <div class="m-t-20 my-5">
                                                        <h6 class="text-muted">Message</h6>
                                                        <textarea id="textarea" class="form-control" maxlength="400" rows="8" placeholder=""
                                                        name="message"></textarea>
                                                    </div>

                                                    <input type="hidden" name="date_of_request" value="<?php echo date("Y-m-d") ?>" >
                                                   
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0">Send Request</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                            </div><!--End Row-->
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

        <script>
            $(document).ready(function() {
                $('.custom-select').select2();
            });
        </script>
       
    </body>

</html>