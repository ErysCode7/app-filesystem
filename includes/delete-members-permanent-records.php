<?php

session_start();

if(isset($_POST["submit"])) {
    require "./connection.php";
    $student_number = $_POST["id"];

    $sql = "DELETE FROM members_permanent_records WHERE student_number = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something Went Wrong";
        header("Location: ../member-permanent-records.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $student_number);
        mysqli_stmt_execute($stmt);
        $_SESSION["delete-success"] = "Delete Sucess!";
        header("Location: ../member-permanent-records.php");
        exit();
    }
    
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../member-permanent-records.php");
    exit();
}

