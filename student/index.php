<?php

session_start();

if (isset($_SESSION['student_email'])) {
    header("Location: upcoming_visits.php");
}

else{
    header('Location: login.php');
}


?>