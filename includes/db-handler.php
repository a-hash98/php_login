<?php
#using a local server
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginbeginner";

$connection = mysqli_connect($serverName,
$dbUsername,
$dbPassword,
$dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

?>