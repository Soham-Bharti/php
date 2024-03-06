<?php
require './cred.php';

$conn = new mysqli($serverName, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    echo "Error while connecting... " . $conn->connect_error;
}
echo "Connection is good!";
