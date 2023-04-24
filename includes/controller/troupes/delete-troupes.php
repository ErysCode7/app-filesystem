<?php

session_start();

if(isset($_POST["submit"])) {
    require "../../model/connection.php";
    $id = $_POST["id"];

    $sql = "DELETE FROM troupes WHERE id = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something Went Wrong";
        header("Location: ../../../pages/troupes.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $_SESSION["delete-success"] = "Delete Sucess!";
        header("Location: ../../../pages/troupes.php");
        exit();
    }
    
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../../troupes.php");
    exit();
}

