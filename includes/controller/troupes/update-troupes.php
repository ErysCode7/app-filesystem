<?php 

session_start();

if(isset($_POST["submit"])) {
    require "../../model/connection.php";
    $id = $_POST["id"];
    $troupes_name = $_POST["troupes_name"];
    
    $sql = "UPDATE troupes SET name = ? WHERE id = '$id';";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong";
        header("Location: ../../pages/update-troupes.php?query=failed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $troupes_name);
        mysqli_stmt_execute($stmt);
        $_SESSION["status-success"] = "Updated Successfully!";
        header("Location: ../../../pages/troupes.php?update=success");
        exit();
    }

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/troupes.php");
    exit();
}
