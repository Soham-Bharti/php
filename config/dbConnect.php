<?php
$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$dbName = 'EmployeeTracker';

// create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    echo "Connection failed! " . mysqli_connect_error();
}
// echo  "Connected successfully";