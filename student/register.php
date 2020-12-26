<?php
    include '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Student Registration</title>
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

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="display-table">
                <div class="display-table-cell">
                    <diV class="container">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body"> 
                                        
                                        <div class="text-center pt-3">
                                            <h2>Student Registration</h2>
                                        </div>
                                       
                                        <div class="p-3">
                                            <form class="form-horizontal mb-0" action="functions/register_action.php" method="post">
                    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text" required="" placeholder="Full Name" name="student_name">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="email" required="" placeholder="Email" name="student_email">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="text" onkeypress="return isNumberKey(event)" maxlength="10"
                                                        minlength="8" placeholder="Phone Number" name="student_phone" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <select name="student_institute" class="form-control select_institute custom-select">
                                                        <option selected disabled >Select Institute</option>
                                                        <?php 
                                                        
                                                        $get_institute_list = "SELECT * FROM `institute`" ; 
                                                        $result = mysqli_query($con, $get_institute_list);
                                                        while($list = mysqli_fetch_assoc($result))
                                                        {
                                                            echo "<option value=".$list['institute_id']." > ".$list['institute_name']." </option>";		
                                                        }    
                                                        
                                                        ?>
                                                    </select>
                                                </div>
                    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="password" required="" placeholder="Password" name="student_password">
                                                    </div>
                                                </div>
                    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                                                            <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-raised btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                                    </div>
                                                </div>
                    
                                                <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-12 m-t-20 text-center">
                                                        <a href="login.php" class="text-muted">Already have account?</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </diV>
                </div>
            </div>
        </div>

        <?php include 'components/scripts.php' ?>

        <script>
            $(document).ready(function() {
                $('.custom-select').select2();
            });
        </script>
         
    </body>
</html>