<?php
session_start();

if(isset($_POST["delete"])) {
    require "../../includes/model/connection.php";
    $student_number = $_POST["student_number"];
    $image_directory = $_POST["image_directory"];

    $file = $image_directory;
    
    if(!unlink($file)) {
        $_SESSION["status"] = "Failed to delete";
        header("Location: ../../pages/view-profile.php?student_number=$student_number");
        exit();
    } else {
        $sql = "DELETE FROM members_image WHERE student_number = '$student_number'";
        $con->query($sql);
        $_SESSION["status-success"] = "Profile Deleted";
        header("Location: ../../pages/view-profile.php?student_number=$student_number");
        exit();

    }

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/view-profile.php?student_number=$student_number");
    exit();
}



