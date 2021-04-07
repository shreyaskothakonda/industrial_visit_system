<?php
	session_start();
	if(isset($_SESSION['institute_email'])){
		session_destroy();
	}
	header("Location: ../../index.html");
?>