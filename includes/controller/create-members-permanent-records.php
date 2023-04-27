<?php 
session_start();

if(isset($_POST["submit"])) {
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
    $address = $_POST["address"];

    $fathers_name = $_POST["fathers_name"];
    $fathers_occupation = $_POST["fathers_occupation"];
    $fathers_phone_number = $_POST["fathers_phone_number"];

    $mothers_name = $_POST["mothers_name"];
    $mothers_occupation = $_POST["mothers_occupation"];
    $mothers_phone_number = $_POST["mothers_phone_number"];
    
    $troup_id = 0;

    if(empty($student_number) || empty($first_name) || empty($last_name)) {
        $_SESSION["status"] = "Fill Empty Fields";
        header("Location: ../../pages/create-members-records.php");
        exit();
    } else if(!preg_match("/^[a-zA-Z09]*$/", $firstname)) {
        $_SESSION["status"] = "Invalid First name";
        header("Location: ../../pages/create-members-records.php");
        exit();
    } else if(!preg_match("/^[a-zA-Z09]*$/", $lastname)) {
        $_SESSION["status"] = "Invalid Last name";
        header("Location: ../../pages/create-members-records.php");
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

        $sql = "INSERT INTO members_permanent_records (troup_id, student_number, first_name, last_name, troupe, contact_number, course, curriculum_year, birthday, date_of_membership, address, active_status, fathers_name, fathers_occupation, fathers_phone_number, mothers_name, mothers_occupation, mothers_phone_number) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../../pages/create-members-records.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $troup_id, $student_number, $first_name, $last_name, $troupe, $contact_number, $course, $curriculum_year, $birthday, $date_of_membership, $address, $active_status, $fathers_name, $fathers_occupation, $fathers_phone_number, $mothers_name, $mothers_occupation, $mothers_phone_number);
            mysqli_stmt_execute($stmt);
            $_SESSION["status-success"] = "Create Member Success!";
            header("Location: ../../pages/members-permanent-records.php?create=success");
            exit();
        }
    } 
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/members-permanent-records.php");
    exit();
}
