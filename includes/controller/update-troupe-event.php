<?php 

session_start();

if(isset($_POST["submit"])) {
    require "../model/connection.php";
    // print_r($_POST); die();
    $id = $_POST["id"];
    $troup_id = $_POST["troup_id"];
    $event = $_POST["event"];
    $time = $_POST["time"];
    $schedule = $_POST["schedule"];
    $event_title = $_POST["event_title"];
    $description = $_POST["description"];
    
    $sql = "UPDATE events SET event = ?, event_title = ?, description = ?, time = ?, schedule = ? WHERE id = '$id';";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong";
        header("Location: ../../pages/view-troupe-event.php?id=".$troup_id."?query=failed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssss", $event, $event_title, $description, $time, $schedule);
        mysqli_stmt_execute($stmt);
        $_SESSION["status-success"] = "Updated Successfully!";
        header("Location: ../../pages/view-troupe-event.php?id=".$troup_id."?update=success");
        exit();
    }

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/view-troupe-event.php?id=".$troup_id);
    exit();
}
