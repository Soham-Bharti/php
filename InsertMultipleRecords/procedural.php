<?php
require '../DbConnect/proceduralConnection.php';
// var_dump($conn);
$sql = "INSERT INTO myGUEST2(first_name, last_name, email) 
values('P', 'K', 'pk.silversky@gmail.com');";
$sql .= "INSERT INTO myGUEST2(first_name, last_name, email) 
values('R', 'S', 'rs.silversky@gmail.com');";
$sql .= "INSERT INTO myGUEST2(first_name, last_name, email) 
values('D', 'S', 'ds.silversky@gmail.com');";

if (mysqli_multi_query($conn, $sql))  echo "<br>MULTIPLE new records inserted successfully<br>";
else echo "Error occurred while inserting multiple rows " . mysqli_error($conn);
// MULTIPLE new records inserted successfully
// 1	Amaresh	Sharma	amaresh8898@gmail.com	2024-03-05 12:36:10
// 2	Tinku	Jiya	tt@gmail.com	2024-03-05 12:43:06
// 3	P	K	pk.silversky@gmail.com	2024-03-05 12:56:09
// 4	R	S	rs.silversky@gmail.com	2024-03-05 12:56:09
// 5	D	S	ds.silversky@gmail.com	2024-03-05 12:56:09
mysqli_close($conn);