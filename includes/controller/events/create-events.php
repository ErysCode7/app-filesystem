<?php 
session_start();

if(isset($_POST["submit"])) {
    require "../../model/connection.php";
    $event = $_POST["event"];
    $schedule = $_POST["schedule"];
    $event_title = $_POST["event_title"];
    $time = $_POST["time"];
    $description = $_POST["description"];
    $troupe = $_POST["troupe"];

    $troup_id = 0;

    if(strlen($description) > 80) {
        $_SESSION["status"] = "Description must be 80 letters only";
        header("Location: ../../../pages/add-event.php");
        exit();
    } else {
        if($troupe === 'Dulaang Rizalia') {
            $troup_id = 1;
        } else if($troupe === 'Sining Biswal') {
            $troup_id = 2;
        } else if($troupe === 'Tunog Rizalia Rondalla') {
            $troup_id = 3;
        } else if($troupe === 'Himig Rizalia') {
            $troup_id = 4;
        } else if($troupe === 'Kultura Rizalia') {
            $troup_id = 5;
        }

        $sql = "INSERT INTO events (troup_id, event, event_title, description, time, schedule, troupe) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
    
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../../../pages/add-event.php");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt, "sssssss", $troup_id, $event, $event_title, $description, $time, $schedule, $troupe);
            mysqli_stmt_execute($stmt);
            $_SESSION["status-success"] = "Create Event Success!";
            header("Location: ../../../pages/events.php?create=success");
            exit();
        }
    }
  
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../../pages/add-event.php");
    exit();
}
