<?php

	include '../../db/db.php';

	session_start();

	$student_email = "";
	$student_password = "";

	//Get student Data
	$student_email =  mysqli_real_escape_string($con, $_POST['student_email']);
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

	//Check if student email is registered and password is correct
	$check_student_email = "SELECT * FROM `student` WHERE `student_email` = '$student_email' AND `student_password` = '$student_password' LIMIT 1" ;
	$run_check_query = mysqli_query($con, $check_student_email);
	$fetch_query_data = mysqli_fetch_assoc($run_check_query);
	$fetch_student_email = $fetch_query_data['student_email'] ;

	if ($fetch_student_email == $student_email ) {
		$fetch_student_id = $fetch_query_data['student_id'] ;
		$fetch_student_name = $fetch_query_data['student_name'] ;

		//Set Session
		$_SESSION['student_name'] = $fetch_student_name;
		$_SESSION['student_email'] = $student_email;
		$_SESSION['msg'] = "You are Logged In" ;
		header("Location: ../index.php");
	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Incorrect Email or Password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
	}
	

?>