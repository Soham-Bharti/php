<?php
// Example (PDO)
$serverName = "localhost";
$userName = "root";
$password = "root";
$dbName = "classicModels";

// Note: In the PDO example above we have also specified a database (myDB). PDO require a valid database to connect to. If no database is specified, an exception is thrown.

// Tip: A great benefit of PDO is that it has an exception class to handle any problems that may occur in our database queries. If an exception is thrown within the try{ } block, the script stops executing and flows directly to the first catch(){ } block.

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    // setting PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected sucessfully";
    var_dump($conn); // object(PDO)#1 (0) { }
} catch (PDOException $ex) {
    echo "Connection failed: " . $ex->getMessage();
}

$conn = null;
var_dump($conn); // null