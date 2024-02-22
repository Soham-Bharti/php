<?php
// PHP Create a MySQL Database

// A database consists of one or more tables.

// You will need special CREATE privileges to create or to delete a MySQL database.

// Create a MySQL Database Using MySQLi and PDO
// The CREATE DATABASE statement is used to create a database in MySQL.

$serverName = "localhost";
$userName = "root";
$password = "root";

$conn = new mysqli($serverName, $userName, $password);
if ($conn->connect_error) {
    echo "Connection failed " . $conn->connect_error;
}
echo "Connected successfully";

// creating db
$dbName = "myDB1";
$sql = "CREATE DATABASE $dbName";
if ($conn->query($sql) === TRUE) {
    echo "<br>Database created successfully.";
}else echo "Error creating database ".$conn->error;

$conn->close();