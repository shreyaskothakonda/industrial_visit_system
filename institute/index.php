<?php

session_start();

if (isset($_SESSION['institute_email'])) {
    header("Location: upcoming_visits.php");
}

else{
    header('Location: login.php');
}


?>