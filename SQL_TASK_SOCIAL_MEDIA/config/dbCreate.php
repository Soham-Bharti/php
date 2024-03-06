<?php
require '../credentials/cred.php';

$conn = new mysqli($serverName, $userName, $password);
$sql = "CREATE DATABASE $dbName";
if ($conn->query($sql) === TRUE) {
    echo "Database created!";
} else echo "Error while creating db " . $conn->error;
