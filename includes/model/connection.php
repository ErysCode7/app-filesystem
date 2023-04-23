<?php

$host = "localhost";
$username = "root";
$password = "";
$database_name = "rtu_fs";
//please remove the port it's only on my local machine
$port = 3308;
$con = new mysqli($host, $username, $password, $database_name, $port);
// $con = new mysqli($host, $username, $password, $database_name);

if($con->connect_error) {
    echo $con->connect_error;
}
