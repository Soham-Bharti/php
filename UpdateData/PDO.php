<?php
require '../DbConnect/PDOconnection.php';

try {
    $sql = "UPDATE myGuest3 set last_name = 'BHARTI' where id = 9";
    $conn->exec($sql);
    echo "Record updated successfully!";
} catch (PDOException $e) {
    echo "Error occurred while updating record!" . $e->getMessage();
}

$conn = null;
