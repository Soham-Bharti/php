<?php
require '../DbConnect/objectOrientedConnection.php';
// var_dump($conn);

$sql = "INSERT INTO myGUEST(first_name, last_name, email) 
values('P', 'K', 'pk.silversky@gmail.com');";
$sql .= "INSERT INTO myGUEST(first_name, last_name, email) 
values('R', 'S', 'rs.silversky@gmail.com');";
$sql .= "INSERT INTO myGUEST(first_name, last_name, email) 
values('D', 'S', 'ds.silversky@gmail.com');";

if ($conn->multi_query($sql) === True) // Multi new record inserted successfully
    echo "<br>Multi new record inserted successfully<br>";
else echo "Error occurred while inserting multiple rows ". $conn->error;
// ...
// 8	P	K	pk.silversky@gmail.com	2024-03-05 12:54:37
// 9	R	S	rs.silversky@gmail.com	2024-03-05 12:54:37
// 10	D	S	ds.silversky@gmail.com	2024-03-05 12:54:37
$conn->close();