<?php
require '../DbConnect/PDOconnection.php';
// var_dump($conn);
try {
    $sql = "INSERT INTO myGUEST3(first_name, last_name, email) 
    values('Kamal', 'Neel', 'nks@gmail.com')";
    var_dump($conn);
    $a = $conn->exec($sql);
    echo $a; // 1
    $lastID = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $lastID; // New record created successfully. Last inserted ID is: 6
} catch (PDOException $e) {
    echo "<br>Error occured while inserting into table : " . $e->getMessage();
}

$conn = null;
