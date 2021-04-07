<?php

include '../../db/db.php';

session_start();

$package_for_request_id = "";
$package_for_institute_id = "";
$package_name = "";
$package_description = "";
$address = "";
$food_option = "";
$instructions = "";
$price = "";

$errors = array();

//get details from create package form
$package_for_request_id = mysqli_real_escape_string($con, $_POST['package_for_request_id']);
$package_for_institute_id = mysqli_real_escape_string($con, $_POST['package_for_institute_id']);
$package_name = mysqli_real_escape_string($con, $_POST['package_name']);
$package_description = mysqli_real_escape_string($con, $_POST['package_description']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$food_option = mysqli_real_escape_string($con, $_POST['food_option']);
$instructions = mysqli_real_escape_string($con, $_POST['instructions']);
$price = mysqli_real_escape_string($con, $_POST['price']);

//insert into database

if(count($errors) == 0){
    
    $insert_into_package = "INSERT INTO `package`(`package_for_request_id`, `package_for_institute_id`, `package_name`, `package_description`, `address`, `food_option`, `instructions`, `price`) 
    VALUES ('$package_for_request_id','$package_for_institute_id','$package_name','$package_description','$address', '$food_option', '$instructions','$price') ";

    $run_insert_query = mysqli_query($con, $insert_into_package);

    if($run_insert_query){
        header("Location: ../upcoming_visits.php?msg=package-created");
    
    }
    else{
        header("Location: ../upcoming_visits.php?msg=error-creating-package");
    }
}




?>