<?php 
session_start();

if(isset($_POST["submit"])) {
    require "../../model/connection.php";
    $troupes_name = $_POST["troupes_name"];

    $sql = "INSERT INTO troupes (name) VALUES(?)";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong";
        header("Location: ../../../pages/add-troupes.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $troupes_name);
        mysqli_stmt_execute($stmt);
        $_SESSION["status-success"] = "Create Troupes Success!";
        header("Location: ../../../pages/troupes.php?create=success");
        exit();  
    }
}
    
// } else {
//     $_SESSION["status"] = "Not Allowed";
//     header("Location: ../../../pages/add-event.php");
//     exit();
// }
