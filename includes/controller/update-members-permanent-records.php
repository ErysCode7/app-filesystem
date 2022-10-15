<?php 
session_start();

if(isset($POST["submit"])) {
    

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../member-permanent-records.php");
    exit();
}

