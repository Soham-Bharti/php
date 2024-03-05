<?php
require '../DbConnect/PDOconnection.php';
// var_dump($conn);
try {
    $sql = "CREATE TABLE myGuest3(
        id int AUTO_INCREMENT PRIMARY KEY,
        first_name varchar(30) not null,
        last_name varchar(30) not null,
        email varchar(50) unique not null,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    var_dump($conn);
    $conn->exec($sql);
    echo "<br>Table created successfully!<br>";
} catch (PDOException $e) {
    echo "Error creating table : " . $e->getMessage();
}
