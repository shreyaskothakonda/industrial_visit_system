<?php

include '../../db/db.php';

session_start();

$request_id = $_SESSION['request_id'] ;
@$request_changes = mysqli_real_escape_string($con, $_POST['request_changes']);

$errors = array();

if($request_changes == "request_changes"){
    
    header("Location: ../upcoming_visits.php");   
}

?>