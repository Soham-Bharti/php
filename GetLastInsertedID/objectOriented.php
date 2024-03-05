<?php
require '../DbConnect/objectOrientedConnection.php';
// var_dump($conn);

$sql = "INSERT INTO myGUEST(first_name, last_name, email) 
values('Bill', 'Gates', 'bill.gates@gmail.com')";

if ($conn->query($sql) === True) // New record inserted successfully
{
    $lastID = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $lastID; // New record created successfully. Last inserted ID is: 7
} else echo "<br>Error occured while inserting into table : " . $conn->error;

$conn->close();
