<?php 
session_start();

if(isset($_POST["submit"])) {
    require "../../model/connection.php";
    $event = $_POST["event"];
    $schedule = $_POST["schedule"];
    $event_title = $_POST["event_title"];
    $time = $_POST["time"];
    $description = $_POST["description"];

   

    if(strlen($description) > 80) {
        $_SESSION["status"] = "Description must be 80 letters only";
        header("Location: ../../../pages/add-event.php");
        exit();
    } else {
        $sql = "INSERT INTO events (event, event_title, description, time, schedule) VALUES(?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
    
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../../../pages/add-event.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $event, $event_title, $description, $time, $schedule);
            mysqli_stmt_execute($stmt);
            $_SESSION["status-success"] = "Create Member Success!";
            header("Location: ../../../pages/events.php?create=success");
            exit();
        }
    }
  
}
    
// } else {
//     $_SESSION["status"] = "Not Allowed";
//     header("Location: ../../../pages/add-event.php");
//     exit();
// }
