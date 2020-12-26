<?php

	include '../../db/db.php';

	session_start();

	//Initialize Variables
	$student_name = "";
	$student_email = "";
	$student_phone = "";
	$student_institute = "";
	$student_password = "";

	$errors = array();

	//Get Industry Data
	$student_name = mysqli_real_escape_string($con, $_POST['student_name']) ;
	$student_email = mysqli_real_escape_string($con, $_POST['student_email']);
	$student_phone = mysqli_real_escape_string($con, $_POST['student_phone']);
	$student_institute = mysqli_real_escape_string($con, $_POST['student_institute']);
	$student_password = md5(mysqli_real_escape_string($con, $_POST['student_password']));

	//Form validation
	if(empty($student_email)) 
	{
		array_push($errors, "student Email is Required" );
	}
	if(empty($student_password)) 
	{
		array_push($errors, "student Password is Required" );
	} 

	//Check if student email already in use
	$check_student_email = "SELECT * FROM `student` WHERE `student_email` = '$student_email' LIMIT 1" ;
	$run_check = mysqli_query($con, $check_student_email);
	$get_check_results = mysqli_fetch_assoc($run_check);

	//If yes then alert user, else register student
	if($get_check_results){
		if ($get_check_results['student_email'] === $student_email ) {
			array_push($errors, "Email Already Exists") ;
		}
	}

	//Register the user if no errors
	if(count($errors) == 0){
		$student_data = "INSERT INTO `student`(`student_name`, `student_email`, `student_password`, `institute_id`, `phone_number`) VALUES ('$student_name', '$student_email','$student_password', '$student_institute', '$student_phone')";
		
		$student_registration = mysqli_query($con, $student_data);

		$_SESSION['student_email'] = $student_email;
		$_SESSION['student_name'] = $student_name;
		$_SESSION['success'] = "You are now Logged in";
		header('location: ../index.php');
	}


?>