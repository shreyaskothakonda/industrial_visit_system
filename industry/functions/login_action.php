<?php

	include '../../db/db.php';

	session_start();

	$industry_email = "";
	$industry_password = "";

	//Get Industry Data
	$industry_email =  mysqli_real_escape_string($con, $_POST['industry_email']);
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

	//Check if industry email is registered and password is correct
	$check_industry_email = "SELECT * FROM `industry` WHERE `industry_email` = '$industry_email' AND `industry_password` = '$industry_password' LIMIT 1" ;
	$run_check_query = mysqli_query($con, $check_industry_email);
	$fetch_query_data = mysqli_fetch_assoc($run_check_query);
	$fetch_industry_email = $fetch_query_data['industry_email'] ;

	if ($fetch_industry_email == $industry_email ) {
		$fetch_industry_id = $fetch_query_data['industry_id'] ;
		$fetch_industry_name = $fetch_query_data['industry_name'] ;

		//Set Session
		$_SESSION['industry_name'] = $fetch_industry_name;
		$_SESSION['industry_email'] = $industry_email;
		$_SESSION['msg'] = "You are Loggin In" ;
		header("Location: ../index.php");
	
	} else {
		echo '<script language="javascript">';
        echo 'alert("Incorrect Email or Password")';
        echo '</script>';
        echo '<meta http-equiv="refresh" content="0;url=../login.php" />';
	}
	

?>