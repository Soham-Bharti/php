<?php
require '../Credentials/cred.php';

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn)
    die("Connection failed " . mysqli_connect_error());

echo "Connection successful";
