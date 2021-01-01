<?php

include '../../db/db.php';

session_start();

$request_id = $_SESSION['request_id'] ;
@$reject = mysqli_real_escape_string($con, $_POST['reject']);

$errors = array();

if($reject == "reject"){
    $reject_request = "UPDATE `requests` SET `request_status` = '-1' WHERE `request_id` = '$request_id' ";
    $run_reject_query = mysqli_query($con, $reject_request);
    
    if($run_reject_query){
        header("Location: ../upcoming_visits.php");
    }

}

?>