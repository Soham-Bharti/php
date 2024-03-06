<?php
require '../DbConnect/objectOrientedConnection.php';
// var_dump($conn);

$prearedStatement = $conn->prepare("INSERT INTO myGuest(first_name, last_name, email) values (?,?,?)");
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
$conn->close();
// 1	Soham	Bharti	soham.silversky@gmail.com	2024-03-05 12:31:52
// 2	Amaresh	Sharma	amaresh89898@gmail.com	2024-03-05 12:34:54
// 4	Amaresh	Sharma	amaresh8898@gmail.com	2024-03-05 12:35:51
// 5	Bill	Gates	bill.gates11@gmail.com	2024-03-05 12:40:52
// 7	Bill	Gates	bill.gates@gmail.com	2024-03-05 12:41:15
// 8	P	K	pk.silversky@gmail.com	2024-03-05 12:54:37
// 9	R	S	rs.silversky@gmail.com	2024-03-05 12:54:37
// 10	D	S	ds.silversky@gmail.com	2024-03-05 12:54:37
// 11	Pinto	Shukla	pintoshukla@gmail.com	2024-03-05 13:16:32
// 12	Pinto2	Shukla2	pintoshukla2@gmail.com	2024-03-05 13:16:32
// 13	Pinto3	Shukla3	pintoshukla3@gmail.com	2024-03-05 13:16:32