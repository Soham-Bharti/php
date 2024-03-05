<?php
require '../DbConnect/PDOconnection.php';
// var_dump($conn);
try {
    $sql = "INSERT INTO myGUEST3(first_name, last_name, email) 
    values('Shubham', 'Thakur', 'thakq009shubh@gmail.com')";

    var_dump($conn);
    $a = $conn->exec($sql);
    echo $a; // 1
    echo "<br>New record inserted successfully<br>";
} catch (PDOException $e) {
    echo "<br>Error occured while inserting into table : " . $e->getMessage();
}

$conn = null;