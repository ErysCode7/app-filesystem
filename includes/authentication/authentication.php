<?php
session_start();
if(!isset($_SESSION["authenticated"])) {
    $_SESSION["status"] = "Please log in to access Dashboard";
    header("Location: ../index.php");
    exit();
}