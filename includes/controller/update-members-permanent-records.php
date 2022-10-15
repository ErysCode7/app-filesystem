<?php 

session_start();

if(isset($POST["submit"])) {
    require "../model/connection.php";
    $student_number = $_POST["student_number"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $contact_number = $_POST["contact_number"];
    $troupe = $_POST["troupe"];
    $course = $_POST["course"];
    $curriculum_year = $_POST["curriculum_year"];
    $date_of_membership = $_POST["date_of_membership"];
    $active_status = $_POST["active_status"];

    $fathers_name = $_POST["fathers_name"];
    $fathers_occupation = $_POST["fathers_occupation"];
    $fathers_phone_number = $_POST["fathers_phone_number"];

    $mothers_name = $_POST["mothers_name"];
    $mothers_occupation = $_POST["mothers_occupation"];
    $mothers_phone_number = $_POST["mothers_phone_number"];

    
    $sql = "UPDATE members_permanent_records SET student_number = ?, first_name = ?, last_name = ?, birthday = ?, contact_number = ?,
    troupe = ?, course = ?, curriculum_year = ?,  date_of_membership = ?, active_status = ?,  fathers_name = ?, fathers_occupation = ?, fathers_phone_number = ?, mothers_name = ?, mothers_occupation = ?, mothers_phone_number = ?  WHERE student_number = ?;";

    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong";
        header("Location: ../../pages/update-members-records.php?query=failed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $student_number, $first_name, $last_name, $birthday, $contact_number, $troupe, $course, $curriculum_year, $date_of_membership, $active_status, $fathers_name, $fathers_occupation, $fathers_phone_number, $mothers_name, $mothers_occupation, $mothers_phone_number, $student_number);
        mysqli_stmt_execute($stmt);
        $_SESSION["status-success"] = "Updated Successfully!";
        header("Location: ../../pages/update-members-records.php?update=success");
        exit();
    }

} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/member-permanent-records.php");
    exit();
}

