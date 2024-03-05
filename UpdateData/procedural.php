<?php
require '../DbConnect/proceduralConnection.php';

$sql = "UPDATE myGuest2 set last_name = 'BHARTI' where id = 4";

if (mysqli_query($conn, $sql)) {
   echo "Row updated successfully!";
} else echo "Unable to update row!";
mysqli_close($conn);
