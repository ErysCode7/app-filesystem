<?php 

session_start();

if(isset($_POST["submit"])) {
    require "./connection.php";
    $username = $_POST["admin_username"];
    $password = $_POST["admin_password"];

    if(empty($username) || empty($password)) {
        $_SESSION["status"] = "Please fill in empty fields!";
        header("Location: ../index.php?error=emptyfields&username=".$username);
        exit();
    } else {
        $sql = "SELECT * FROM administrator WHERE username = ?;";
        $stmt = mysqli_stmt_init($con);
   
    } if(!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION["status"] = "Something went wrong!";
        header("Location: ../index.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if($row = $result->fetch_assoc()) {
            
            $password = password_verify($password, $row["password"]);

            if($password == false) {
                $_SESSION["status"] = "Wrong Password";
                header("Location: ../index.php");
                exit();

            } else if($password == true) {
                $_SESSION["authenticated"] = TRUE;
                $_SESSION["success-status"] = "Login Success!";
                header("Location: ../dashboard.php");
                exit();

            } else {
                $_SESSION["status"] = "Wrong Password";
                header("Location: ../index.php");
                exit();
            }

        } else {
            $_SESSION["status"] = "No existing account. Please sign up";
            header("Location: ../index.php");
            exit();
        }
    }
       
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../index.php");
    exit();
}