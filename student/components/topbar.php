<!-- Top Bar Start -->
<div class="topbar">

<nav class="navbar-custom">
    <div class="dropdown notification-list nav-pro-img">

        <div class="list-inline-item hide-phone app-search">
            <form role="search" class="">
                <div class="form-group pt-1">
                    <input type="text" class="form-control" placeholder="Search..">
                    <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <ul class="list-inline float-right mb-0 mr-3">
        <!-- language-->
        
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <i class="mdi mdi-account-circle mdi-24px m-2" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5>Welcome <?php echo $student_first_name; ?></h5>
                </div>
                <a class="dropdown-item" href="profile.php">
                    <i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="functions/logout.php">
                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
            </div>
        </li>
    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-light waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>

    <div class="clearfix"></div>

</nav>

</div>
<!-- Top Bar End -->