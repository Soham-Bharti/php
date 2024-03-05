<?php
require '../DbConnect/proceduralConnection.php';
// var_dump($conn);

$prearedStatement = $conn->prepare("INSERT INTO myGuest2(first_name, last_name, email) values (?,?,?)");
$prearedStatement->bind_param('sss', $first_name, $last_name, $email);
// This function binds the parameters to the SQL query and tells the database what the parameters are. The "sss" argument lists the types of data that the parameters are. The s character tells mysql that the parameter is a string.
// The argument may be one of four types:
// i - integer
// d - double
// s - string
// b - BLOB

$first_name = 'Pinto';
$last_name = 'Shukla';
$email = "pintoshukla@gmail.com";
$prearedStatement->execute();

$first_name = 'Pinto2';
$last_name = 'Shukla2';
$email = "pintoshukla2@gmail.com";
$prearedStatement->execute();

$first_name = 'Pinto3';
$last_name = 'Shukla3';
$email = "pintoshukla3@gmail.com";
$prearedStatement->execute();

echo "Records inserted successfully";
$prearedStatement->close();
mysqli_close($conn);
// 1	Amaresh	Sharma	amaresh8898@gmail.com	2024-03-05 12:36:10
// 2	Tinku	Jiya	tt@gmail.com	2024-03-05 12:43:06
// 3	P	K	pk.silversky@gmail.com	2024-03-05 12:56:09
// 4	R	S	rs.silversky@gmail.com	2024-03-05 12:56:09
// 5	D	S	ds.silversky@gmail.com	2024-03-05 12:56:09
// 7	Pinto	Shukla	pintoshukla@gmail.com	2024-03-05 13:18:21
// 8	Pinto2	Shukla2	pintoshukla2@gmail.com	2024-03-05 13:18:21
// 9	Pinto3	Shukla3	pintoshukla3@gmail.com	2024-03-05 13:18:21