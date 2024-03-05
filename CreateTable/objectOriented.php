<?php
require '../DbConnect/objectOrientedConnection.php';
// var_dump($conn);

$sql = "CREATE TABLE myGuest(
    id int AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(30) not null,
    last_name varchar(30) not null,
    email varchar(50) unique not null,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql))
    echo "Table created successfully!<br>";
else echo "Error occured while creating table : " . $conn->error;
