<?php

include '../db/db.php';
session_start();

if (isset($_SESSION['institute_email'])) {
    @$msg = $_SESSION['msg'] ;

    @$institute_name = $_SESSION['institute_name'];
    @$institute_id = $_SESSION['institute_id'];
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
                                        <h4 class="page-title">Create Package</h4>
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
                                            <h4 class="mt-0 header-title">
                                            </h4>
                                            <div class="general-label">
                                                <form class="mb-0" action="functions/create_package_action.php" method="post">

                                                <div class="form-group">
                                                        <select name="package_for_request_id" class="form-control select2 form-control mb-3 custom-select">
                                                            <option selected disabled >Select Visiting Industry</option>
    <?php 

        $get_industry_list = "SELECT * FROM `requests` WHERE `request_status` = '1' AND `request_from_institute_id` = '$institute_id' " ;
        $result = mysqli_query($con, $get_industry_list);
        while($list = mysqli_fetch_assoc($result))
        {
        echo "<option value=".$list['request_id']." >".$list['request_to_industry_name']." </option>";

        }

    ?>
                                                        </select>
                                                    </div>

                                                    <input type="hidden" name="package_for_institute_id" value="<?php echo $institute_id?>">

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1" class="bmd-label-floating ">Package Name</label>
                                                        <input type="text" class="form-control"
                                                        name="package_name"> 
                                                    </div>

                                                    <div class="m-t-20 mt-5">
                                                        <h6 class="text-muted">Description</h6>
                                                        <textarea id="textarea" class="form-control" maxlength="125" rows="3" placeholder=""
                                                        name="package_description"></textarea>
                                                    </div>

                                                    <div class="m-t-20 mt-5">
                                                        <h6 class="text-muted">Industry Address</h6>
                                                        <textarea id="textarea" class="form-control" maxlength="125" rows="3" placeholder=""
                                                        name="address"></textarea>
                                                    </div>

                                                    <div class="m-t-20 mt-5">
                                                        <h6 class="text-muted">Food Availability</h6>
                                                        <label class="radio-inline mr-2">
                                                            <input type="radio" name="food_option" 
                                                            value="1"> Yes
                                                        </label>
                                                        <label class="radio-inline mr-2">
                                                            <input type="radio" name="food_option"  value="0"> No
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="m-t-20 my-5">
                                                        <h6 class="text-muted">Instructions</h6>
                                                        <textarea id="textarea" class="form-control" maxlength="1000" rows="8" placeholder=""
                                                        name="instructions" required></textarea>
                                                    </div>

                                                    <div class="m-t-20 mt-5 ">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon1">₹</span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1"
                                                            name="price"
                                                            onkeypress="return isNumberKey(event)" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <button type="submit" class="btn btn-primary btn-raised mb-0 mt-3">Create Package</button>
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

