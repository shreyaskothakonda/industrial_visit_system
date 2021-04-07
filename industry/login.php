<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Login - Industry Panel</title>
        <?php include 'components/stylesheets.php' ?>

    </head>
    <body style="background: #E0E0E2">


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
                                        <h2>Industry Login</h2>
                                    </div>
                                    <div class="px-3 pb-3">
                                        <form class="form-horizontal m-t-20 mb-0" action="functions/login_action.php" method="post">
                                            
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" required="" placeholder="Email" name="industry_email">
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="password" required="" placeholder="Password" color="#000000" name="industry_password">
                                                </div>
                                            </div>
                    
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="form-group text-right row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit" name="industry_login">Log In</button>
                                                </div>
                                            </div>
                    
                                            <div class="form-group m-t-10 mb-0 row">
                                                <div class="col-sm-7 m-t-20">
                                                    <a href="recover-password.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password ?</a>
                                                </div>
                                                <div class="col-sm-5 m-t-20">
                                                    <a href="register.php" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account ?</a>
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



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap-material-design.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>