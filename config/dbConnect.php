<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'employeetracker';

// create connection
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    echo "Connection failed! " . mysqli_connect_error();
}
// echo  "Connected successfully";
