<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "SELECT * FROM myGuest limit 5";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: ".$row['id']." - First Name: ".$row['first_name']."<br>";
    }
} else echo "0 records returned!";

$conn->close();