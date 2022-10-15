<?php 

session_start();

if(isset($POST["submit"])) {
    require "../model/connection.php";
    $student_number = $_POST["student_number"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../member-permanent-records.php");
    exit();
}

