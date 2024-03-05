<?php
require '../Credentials/cred.php';

$conn = new mysqli($serverName, $userName, $password);

if ($conn->connect_error)
    echo "Connection failed " . $conn->connect_error;

echo "Connection successful";
