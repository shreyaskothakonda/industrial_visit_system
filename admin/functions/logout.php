<?php
	session_start();
	if(isset($_SESSION['admin_email'])){
		session_destroy();
		header("Location:../login.php");
	}
?>