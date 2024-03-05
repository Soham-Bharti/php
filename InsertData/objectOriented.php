<?php
require '../DbConnect/objectOrientedConnection.php';
// var_dump($conn);

$sql = "INSERT INTO myGUEST(first_name, last_name, email) 
values('Soham', 'Bharti', 'soham.silversky@gmail.com')";

if ($conn->query($sql) === True) // New record inserted successfully
    echo "<br>New record inserted successfully<br>";
else echo "<br>Error occured while inserting into table : " . $conn->error;

$conn->close();