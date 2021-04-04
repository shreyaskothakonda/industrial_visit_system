<?php

	include '../../db/db.php';

	session_start();

	//Get Admin Data
	$admin_email = $_POST['admin_email'];
	$admin_password = md5($_POST['admin_password']);

	//Check if admin email is registered and password is correct
	$get_admin_email = "SELECT * FROM `admin` WHERE `admin_email` = '$admin_email' AND `admin_password` = '$admin_password'";
	$run_check_query = mysqli_query($con, $get_admin_email);
	$fetch_query_data = mysqli_fetch_array($run_check_query);
	$fetch_admin_email = $fetch_query_data['admin_email'] ;
	$fetch_admin_password = $fetch_query_data['admin_password'] ;

	if ($fetch_admin_email == $admin_email ) {
		$fetch_admin_id = $fetch_query_data['admin_id'] ;
		$fetch_admin_name = $fetch_query_data['admin_name'] ;

		//Set Session
		$_SESSION['admin_id'] = $fetch_admin_id;
		$_SESSION['admin_name'] = $fetch_admin_name;
		$_SESSION['admin_email'] = $admin_email;
		header("Location: ../index.php");
	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Incorrect Email or Password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
	}
	

?>