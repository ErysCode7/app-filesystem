<?php
session_start();

if(isset($_POST["submit"])) {
    require "../model/connection.php";
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $token = md5(rand());
    $status = 0;

    if(empty($name) || empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION["status"] = "Fill all empty Fields";
        header("Location: ../../pages/sign-up.php?error=emptyfields&name=".$name."&username=".$username);
        exit();
    }  else if(strlen($username) < 5) {
        $_SESSION["status"] = "Username must contain at least 5 characters";
        header("Location: ../../pages/sign-up.php?error=usernametooshort&name=".$name);
        exit();
    } else if(strlen($password) < 6) {
        $_SESSION["status"] = "Password must contain at least 6 characters";
        header("Location: ../../pages/sign-up.php?error=passwordtooshort&name=".$name."&username=".$username);
        exit();
    } else if($password !== $confirm_password) {
        $_SESSION["status"] = "Password did not match";
        header("Location: ../../pages/sign-up.php?error=passwordsdidnotmatch&name=".$name."&username=".$username);
        exit();
    } else {
        $sql = "SELECT * FROM administrator WHERE username = ? LIMIT 1;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            $_SESSION["status"] = "Something went wrong";
            header("Location: ../../pages/sign-up.php");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowEmailCount = mysqli_stmt_num_rows($stmt);

            if($rowEmailCount > 0) {
                $_SESSION["status"] = "Username Already Taken";
                header("Location: ../../pages/sign-up.php?error=usernametaken&name=".$name."&username=".$username);
                exit();
            } else {
                $sql = "SELECT * FROM administrator WHERE username = ? LIMIT 1;";
                $stmt = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    $_SESSION["status"] = "Something went wrong";
                    header("Location: ../../pages/sign-up.php");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $rowUsernameCount = mysqli_stmt_num_rows($stmt);

                    if($rowUsernameCount > 0) {
                        $_SESSION["status"] = "Username Already Taken";
                        header("Location: ../../pages/sign-up.php?error=usernametaken&name=".$name);
                        exit();
                    } else {
                        $sql = "INSERT INTO administrator(name, username, password) VALUES(?, ?, ?);";
                        $stmt = mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            $_SESSION["status"] = "Something went wrong";
                            header("Location: ../../pages/sign-up.php");
                            exit();
                        } else {
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "sss", $name, $username, $password);
                            mysqli_stmt_execute($stmt);
                            $_SESSION["success-status"] = "Sign up Success.";
                            header("Location: ../../index.php");
                        }
                    }
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    $_SESSION["status"] = "Not Allowed";
    header("Location: ../../pages/sign-up.php");
    exit();
}