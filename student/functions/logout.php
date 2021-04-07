<?php
	session_start();
	if(isset($_SESSION['industry_email'])){
		session_destroy();
	}
	header("Location: ../../index.html");
?>