<?php

	include '../../db/db.php';

	//Get admin Data
	$admin_name = $_POST['admin_name'];
	$admin_email = $_POST['admin_email'];
	$admin_password = md5($_POST['admin_password']);

	//Check if admin email already in use
	$get_admin_email = "SELECT * FROM `admin` WHERE `admin_email` = '$admin_email'";
	$run_check_query = mysqli_query($con, $get_admin_email);
	$fetch_query_data = mysqli_fetch_array($run_check_query);
	$fetch_admin_email = $fetch_query_data['admin_email'] ;


	//If yes then alert user, else register admin
	if($fetch_admin_email == $admin_email){
		echo '<script language="javascript">';
	    echo 'alert("Email Already in Use")';
	    echo '</script>';
	    echo '<meta http-equiv="refresh" content="0;url=../register.php" />';
	}

	else{
		$admin_data = "INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_password`) VALUES ('$admin_name','$admin_email','$admin_password') ";
		$admin_registration = mysqli_query($con, $admin_data);
		
		if($admin_registration)
        {
            echo '<script language="javascript">';
            echo 'alert("Admin Successfully Registered")';
            echo '</script>';
        }

        else{
        	echo '<script language="javascript">';
            echo 'alert("Error Registering Admin")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=../register.php" />';
        }
	}
		

?>