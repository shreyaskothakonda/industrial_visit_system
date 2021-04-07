<?php

include '../../db/db.php';

session_start();

$request_id = $_SESSION['request_id'] ;
$accept = $_POST['accept'];


if($accept == "accept"){
    $accept_request = "UPDATE `requests` SET `request_status` = '1' WHERE `request_id` = '$request_id' ";
    $run_accept_query = mysqli_query($con, $accept_request);
    
    if($run_accept_query){
        header("Location: ../upcoming_visits.php");
    }

}

?>