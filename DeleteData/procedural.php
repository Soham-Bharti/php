<?php
require '../DbConnect/proceduralConnection.php';

$sql = "DELETE from myGuest2 where id = 3";

if (mysqli_query($conn, $sql)) {
   echo "Row deleted successfully!";
} else echo "Unable to delete row!";
mysqli_close($conn);
