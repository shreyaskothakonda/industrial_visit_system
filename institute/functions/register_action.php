<?php

	include '../../db/db.php';

	//Get Student Data
	$student_name = $_POST['student_name'];
	$student_email = $_POST['student_email'];
	$student_password = md5($_POST['student_password']);

	//Check if student email already in use
	$get_student_email = "SELECT * FROM `student` WHERE `student_email` = '$student_email'";
	$run_check_query = mysqli_query($con, $get_student_email);
	$fetch_query_data = mysqli_fetch_array($run_check_query);
	$fetch_student_email = $fetch_query_data['student_email'] ;


	//If yes then alert user, else register student
	if($fetch_student_email == $student_email){
		echo '<script language="javascript">';
	    echo 'alert("Email Already in Use")';
	    echo '</script>';
	    echo '<meta http-equiv="refresh" content="0;url=../register.php" />';
	}

	else{
		$student_data = "INSERT INTO `student`(`student_name`, `student_email`, `student_password`) VALUES ('$student_name','$student_email','$student_password') ";
		$student_registration = mysqli_query($con, $student_data);
		
		if($student_registration)
        {
            echo '<script language="javascript">';
            echo 'alert("Student Successfully Registered")';
            echo '</script>';
            session_start();
            $_SESSION['student_id'] = $fetch_student_id;
			$_SESSION['student_name'] = $fetch_student_name;
			$_SESSION['student_email'] = $fetch_student_email;
			header("Location: ../index.php");
        }

        else{
        	echo '<script language="javascript">';
            echo 'alert("Error Registering Student")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=../register.php" />';
        }
	}
		

?>