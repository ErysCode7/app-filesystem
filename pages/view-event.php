<?php
   require "../includes/authentication/authentication.php";
?>

<?php require "../includes/view/header.php"; ?>

<?php

if(isset($_GET["id"])) {
   require "../includes/model/connection.php";
   $id = $_GET["id"];
   $sql = "SELECT * FROM events WHERE id = '$id';";
   $result = $con->query($sql);

   $row = $result->fetch_assoc();
}

?>

 

<?php include "../includes/view/footer.php" ?>