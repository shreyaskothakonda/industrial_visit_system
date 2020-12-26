<?php

	include '../../db/db.php';

	session_start();

	$institute_email = "";
	$institute_password = "";
	
	$errors = array();

	//Get institute Data
	$institute_email =  mysqli_real_escape_string($con, $_POST['institute_email']);
	$institute_password = md5(mysqli_real_escape_string($con, $_POST['institute_password']));

	//Form validation
	if(empty($institute_email)) 
	{
		array_push($errors, "Institute Email is Required" );
	}
	if(empty($institute_password)) 
	{
		array_push($errors, "Institute Password is Required" );
	}

	//Check if institute email is registered and password is correct
	$check_institute_email = "SELECT * FROM `institute` WHERE `institute_email` = '$institute_email' AND `institute_password` = '$institute_password' LIMIT 1" ;
	$run_check_query = mysqli_query($con, $check_institute_email);
	$fetch_query_data = mysqli_fetch_assoc($run_check_query);
	$fetch_institute_email = $fetch_query_data['institute_email'] ;
	$fetch_institute_name = $fetch_query_data['institute_name'] ;
	$fetch_institute_id = $fetch_query_data['institute_id'] ;

	if ($fetch_institute_email == $institute_email ) {
		//Set Session
		$_SESSION['institute_id'] = $fetch_institute_id ;
		$_SESSION['institute_name'] = strval($fetch_institute_name);
		$_SESSION['institute_email'] = strval($fetch_institute_email);
		$_SESSION['msg'] = "You are Loggin In" ;

		header("Location: ../dashboard.php");
	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Incorrect Email or Password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
	}
	

?>