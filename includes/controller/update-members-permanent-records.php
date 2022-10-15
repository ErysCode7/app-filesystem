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
    $address = $_POST["address"];
    $address = $_POST["address"];
    $address = $_POST["address"];

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../member-permanent-records.php");
    exit();
}

