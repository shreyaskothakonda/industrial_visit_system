<?php

session_start();

if (isset($_SESSION['institute_email'])) {
    header("Location: dashboard.php");
}

else{
    header('Location: login.php');
}


?>