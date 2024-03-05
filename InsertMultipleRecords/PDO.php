<?php
require '../DbConnect/PDOconnection.php';
// var_dump($conn);
// The PDO way is a little bit different:
try {
    // begin the transaction
    $conn->beginTransaction();

    // SQL statements
    $conn->exec("INSERT INTO myGUEST3(first_name, last_name, email) 
    values('P', 'K', 'pk.silversky@gmail.com')");
    $conn->exec("INSERT INTO myGUEST3(first_name, last_name, email) 
    values('R', 'S', 'rs.silversky@gmail.com');");
    $conn->exec("INSERT INTO myGUEST3(first_name, last_name, email) 
    values('D', 'S', 'ds.silversky@gmail.com');");

    // commit the transactions
    $conn->commit();
    echo "<br>MULTIPLE new records inserted successfully<br>";

} catch (PDOException $e) {
    // roll back transaction if something failed
    $conn->rollback();
    echo "Error occurred while inserting multiple rows ".$e->getMessage();
}
// MULTIPLE new records inserted successfully
// 1	Amaresh	Sharma	amaresh8898@gmail.com	2024-03-05 12:37:02
// 2	Shubham	Thakur	thak009shubh@gmail.com	2024-03-05 12:37:31
// 4	Shubham	Thakur	thakq009shubh@gmail.com	2024-03-05 12:37:58
// 6	Kamal	Neel	nks@gmail.com	2024-03-05 12:44:23
// 8	P	K	pk.silversky@gmail.com	2024-03-05 13:02:35
// 9	R	S	rs.silversky@gmail.com	2024-03-05 13:02:35
// 10	D	S	ds.silversky@gmail.com	2024-03-05 13:02:35
$conn = null;