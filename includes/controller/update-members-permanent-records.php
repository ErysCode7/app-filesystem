<?php 

session_start();

if(isset($POST["submit"])) {
    require "../model/connection.php";
    $student_number = $_POST["student_number"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $contact_number = $_POST["contact_number"];
    $troupe = $_POST["troupe"];
    $course = $_POST["course"];
    $curriculum_year = $_POST["curriculum_year"];
    $date_of_membership = $_POST["date_of_membership"];
    $active_status = $_POST["active_status"];
    

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../member-permanent-records.php");
    exit();
}

