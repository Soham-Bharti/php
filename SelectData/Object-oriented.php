<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "SELECT * from myGuest";
$result = $conn->query($sql);
var_dump($result);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // var_dump($row);
        echo "<br> id: <b>" . $row['id'] . "</b>- First Name: " . $row['first_name'] . "- Last Name: " . $row['last_name'] . "- Email: " . $row['email'];
    }
} else echo "0 rows returned!";
