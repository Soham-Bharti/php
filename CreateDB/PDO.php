<?php
// Example (MySQLi Procedural)
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "myDB3";

try {
    $conn = new PDO("mysql:host=$serverName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
    try {
        $sql = "CREATE DATABASE $dbName";
        $conn->exec($sql);
        echo "Database created successfully!";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conn = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

