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

    if(empty($event) || empty($schedule) || empty($event_title) || empty($time)) {
        $_SESSION["status"] = "Fill in empty fields";
        header("Location: ../../../pages/add-event.php");
        exit();
    } else if(strlen($description) > 500) {
        $_SESSION["status"] = "Description must be 500 characters only";
        header("Location: ../../../pages/add-event.php");
        exit();
    } else {
        $sql =  "SELECT * FROM troupes WHERE name = '$troupe';";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();      

        if($troupe === $row['name']) {
            $troup_id =  $row['id'];
        }
        
        // print_r($row['id'].$row['name']); die();

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
