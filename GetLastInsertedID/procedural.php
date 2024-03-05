<?php
require '../DbConnect/proceduralConnection.php';
// var_dump($conn);
$sql = "INSERT INTO myGUEST2(first_name, last_name, email) 
values('Tinku', 'Jiya', 'tt@gmail.com')";

if (mysqli_query($conn, $sql)) {
    $lastID = mysqli_insert_id($conn);
    echo "New record created successfully. Last inserted ID is: " . $lastID; // New record created successfully. Last inserted ID is: 2
} else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);

mysqli_close($conn);
