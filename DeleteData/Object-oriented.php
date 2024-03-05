<?php
require '../DbConnect/objectOrientedConnection.php';

$sql = "DELETE FROM myGuest where id = 12";

if ($conn->query($sql) === TRUE) {
 echo "record deleted!";
} else echo "Unalble to delete record!";

$conn->close();