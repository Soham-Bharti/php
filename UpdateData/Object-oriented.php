<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "UPDATE myGuest set last_name = 'Singh' where id = 8";

if ($conn->query($sql) === TRUE) {
 echo "record updated!";
} else echo "Unable to update record!";

$conn->close();