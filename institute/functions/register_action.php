<?php

	include '../../db/db.php';

	session_start();

	//Initialize Variables
	$institute_name = "";
	$institute_email = "";
	$institute_website = "";
	$institute_address = "";
	$institute_city = "";
	$institute_state = "";
	$institute_password = "";

	$errors = array();

	//Get Industry Data
	$institute_name = mysqli_real_escape_string($con, $_POST['institute_name']) ;
	$institute_email = mysqli_real_escape_string($con, $_POST['institute_email']);
	$institute_website = mysqli_real_escape_string($con, $_POST['institute_website']);
	$institute_address = mysqli_real_escape_string($con, $_POST['institute_address']);
	$institute_city = mysqli_real_escape_string($con, $_POST['institute_city']);
	$institute_state = mysqli_real_escape_string($con, $_POST['institute_state']);
	$institute_password = md5(mysqli_real_escape_string($con, $_POST['institute_password']));

	//Form validation
	if(empty(institute_email)) 
	{
		array_push($errors, "Institute Email is Required" );
	}
	if(empty($institute_password)) 
	{
		array_push($errors, "Institute Password is Required" );
	} 

	//Check if institute email already in use
	$check_institute_email = "SELECT * FROM `institute` WHERE `institute_email` = '$institute_email' LIMIT 1" ;
	$run_check = mysqli_query($con, $check_institute_email);
	$get_check_results = mysqli_fetch_assoc($run_check);

	//If yes then alert user, else register institute
	if($get_check_results){
		if ($get_check_results['institute_email'] === $institute_email ) {
			array_push($errors, "Email Already Exists") ;
		}
	}

	//Register the user if no errors
	if(count($errors) == 0){
		$institute_data = "INSERT INTO `institute`(`institute_name`, `institute_email`, `institute_website`, `institute_password`, `institute_address`, `institute_city`, `institute_state`) VALUES ('$institute_name','$institute_email', '$institute_website','$institute_password', '$institute_address', '$institute_city', '$institute_state') ";
		
		$institute_registration = mysqli_query($con, $institute_data);

		$_SESSION['institute_email'] = $institute_email;
		$_SESSION['institute_name'] = $institute_name;
		$_SESSION['success'] = "You are now Logged in";
		header('location: ../index.php');
	}


?>