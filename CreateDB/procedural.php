<?php
// Example (MySQLi Procedural)
$serverName = "localhost";
$userName = "root";
$password = "root";

$conn = mysqli_connect($serverName, $userName, $password);

if (!$conn) {
    echo  "Connection Failed!" . mysqli_connect_error();
}

// creating db
$dbName = "myDB2";
$sql = "CREATE DATABASE $dbName";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else echo "Error creating database " . mysqli_error($conn);

mysqli_close($conn);