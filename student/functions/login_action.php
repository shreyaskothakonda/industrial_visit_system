<?php

	include '../../db/db.php';

	session_start();

	//Get Student Data
	$student_email = $_POST['student_email'];
	$student_password = md5($_POST['student_password']);

	//Check if student email is registered and password is correct
	$get_student_email = "SELECT * FROM `student` WHERE `student_email` = '$student_email' AND `student_password` = '$student_password'";
	$run_check_query = mysqli_query($con, $get_student_email);
	$fetch_query_data = mysqli_fetch_array($run_check_query);
	$fetch_student_email = $fetch_query_data['student_email'] ;
	$fetch_student_password = $fetch_query_data['student_password'] ;

	if ($fetch_student_email == $student_email ) {
		$fetch_student_id = $fetch_query_data['student_id'] ;
		$fetch_student_name = $fetch_query_data['student_name'] ;

		//Set Session
		$_SESSION['student_id'] = $fetch_student_id;
		$_SESSION['student_name'] = $fetch_student_name;
		$_SESSION['student_email'] = $fetch_student_email;
		header("Location: ../index.php");
	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Incorrect Email or Password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
	}
	

?>