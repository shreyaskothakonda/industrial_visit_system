<?php

include '../../db/db.php';

session_start();

$request_from_institute_id = $_SESSION['institute_id'];
$request_from_institute_name = "";
$request_to_industry_id = "";   
$request_to_industry_name = "";   
$institute_email = $_SESSION['institute_email'];
$institute_phone_number = "";
$industry_name = "";
$number_of_students = "";
$number_of_faculties = "";
$number_of_days = "";
$date_of_visit = "";
$subject = "";
$message = "";
$date_of_request = "";
$request_status = "";

$errors = array();

//get details from plan_a_visit form
$request_from_institute_name = mysqli_real_escape_string($con, $_POST['institute_name']);
$request_to_industry_id = mysqli_real_escape_string($con, $_POST['industry_id']); 

//get industry details for industry name
$get_industry_details = "SELECT * FROM `industry` WHERE `industry_id` = '$request_to_industry_id' ";
$run_query_for_industry = mysqli_query($con, $get_industry_details);
$industry_details = mysqli_fetch_assoc($run_query_for_industry);

if ($industry_details == NULL) {
    array_push($errors, "No Industry Details Found") ;
}

$request_to_industry_name = $industry_details['industry_name'];
$institute_email = mysqli_real_escape_string($con, $_POST['institute_email']);  
$institute_phone_number = mysqli_real_escape_string($con, $_POST['institute_phone_number']);
$number_of_students = mysqli_real_escape_string($con, $_POST['number_of_students']);
$number_of_faculties = mysqli_real_escape_string($con, $_POST['number_of_faculties']);
$number_of_days = mysqli_real_escape_string($con, $_POST['number_of_days']);
$date_of_visit = mysqli_real_escape_string($con, $_POST['date_of_visit']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$date_of_request = mysqli_real_escape_string($con, $_POST['date_of_request']);
$request_status = 0;

echo $errors ;

//insert into database
if(count($errors) == 0){
    $insert_into_request = "INSERT INTO `requests`(`request_from_institute_id`, `request_from_institute_name`, `request_to_industry_id`, `request_to_industry_name`, `institute_phone_number`, `number_of_students`, `number_of_faculties`, `number_of_days`, `date_of_visit`, `subject`, `message`, `date_of_request`, `request_status`) 
    VALUES ('$request_from_institute_id','$request_from_institute_name','$request_to_industry_id','$request_to_industry_name','$institute_phone_number','$number_of_students','$number_of_faculties','$number_of_days','$date_of_visit','$subject','$message','$date_of_request', '$request_status') ";

    $run_insert_query = mysqli_query($con, $insert_into_request);

    if($run_insert_query){
        header("Location: ../plan_a_visit.php?msg=request-sent");
    
    }
    else{
        header("Location: ../plan_a_visit.php?msg=error-sending-request");
    }
}



?>