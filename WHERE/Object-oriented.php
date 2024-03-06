<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "SELECT first_name from myGuest where last_name like '%a'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['first_name'] . "</h3>";
    }
} else echo "0 rows retuned!";

// Amaresh
// Amaresh
// Pinto
