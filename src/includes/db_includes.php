<?php

$servername = "localhost";
$dbUsername = "web";
$dbPassword = "";
$dbName = "wol";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    // TODO pipe mysqli error to logfile 
    // .mysqli_connect_error()
    die("Connection failed!");
    header("Location:../index.php");
}
