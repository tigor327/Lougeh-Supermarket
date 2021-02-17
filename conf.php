<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "lougeh";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>