<?php
require '../Credentials/cred.php';

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // setting PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
} catch (PDOException $ex) {
    echo "Connection failed: " . $ex->getMessage();
}
