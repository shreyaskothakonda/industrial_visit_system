<?php

	include '../../db/db.php';

	session_start();

	//Initialize Variables
	$industry_name = "";
	$industry_email = "";
	$industry_website = "";
	$industry_address = "";
	$industry_city = "";
	$industry_state = "";
	$industry_password = "";

	$errors = array();

	//Get Industry Data
	$industry_name = mysqli_real_escape_string($con, $_POST['industry_name']) ;
	$industry_email = mysqli_real_escape_string($con, $_POST['industry_email']);
	$industry_website = mysqli_real_escape_string($con, $_POST['industry_website']);
	$industry_address = mysqli_real_escape_string($con, $_POST['industry_address']);
	$industry_city = mysqli_real_escape_string($con, $_POST['industry_city']);
	$industry_state = mysqli_real_escape_string($con, $_POST['industry_state']);
	$industry_password = md5(mysqli_real_escape_string($con, $_POST['industry_password']));

	//Form validation
	if(empty($industry_email)) 
	{
		array_push($errors, "Industry Email is Required" );
	}
	if(empty($industry_password)) 
	{
		array_push($errors, "Industry Password is Required" );
	} 

	//Check if industry email already in use
	$check_industry_email = "SELECT * FROM `industry` WHERE `industry_email` = '$industry_email' LIMIT 1" ;
	$run_check = mysqli_query($con, $check_industry_email);
	$get_check_results = mysqli_fetch_assoc($run_check);

	//If yes then alert user, else register industry
	if($get_check_results){
		if ($get_check_results['industry_email'] === $industry_email ) {
			array_push($errors, "Email Already Exists") ;
		}
	}

	//Register the user if no errors
	if(count($errors) == 0){
		$industry_data = "INSERT INTO `industry`(`industry_name`, `industry_email`, `industry_website`,`industry_password`, `industry_address`, `industry_city`, `industry_state`) VALUES ('$industry_name','$industry_email', '$industry_website','$industry_password', '$industry_address', '$industry_city', '$industry_state') ";
		
		$industry_registration = mysqli_query($con, $industry_data);

		$_SESSION['industry_email'] = $industry_email;
		$_SESSION['industry_name'] = $industry_name;
		$_SESSION['success'] = "You are now Logged in";
		header('location: ../index.php');
	}


?>