<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "SELECT first_name from myGuest order by first_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['first_name'] . "</h3>";
    }
} else echo "0 rows retuned!";

// Amaresh
// Amaresh
// Bill
// Bill
// D
// P
// Pinto
// Pinto2
// Pinto3
// R
// Soham
$conn->close();