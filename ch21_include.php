<?php
function doDB() {
global $mysqli;

$servername = "mysql-76699-0.cloudclusters.net";
$username = "admin";
$password = "lNThOHq5";
$dbname   = "testdb";
$dbServerPort = 14840;

// Create connection
$db = new mysqli($servername, $username, $password, $dbname, $dbServerPort,);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

//connect to server and select database; you may need it
 //$mysqli = mysqli_connect("localhost", 'root', '', "testDB");

 //if connection fails, stop script execution
 if (mysqli_connect_errno()) {
 printf("Connect failed: %s\n", mysqli_connect_error());
 exit();
}
 }
?>