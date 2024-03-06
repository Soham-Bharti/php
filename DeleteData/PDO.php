<?php
require '../DbConnect/PDOconnection.php';

try {
    $sql = "DELETE FROM myGuest3 where id = 2";
    $conn->exec($sql);

    echo "Record deleted successfully!";
} catch (PDOException $e) {
    echo "Error occurred while deleting record " . $e->getMessage();
}

$conn = null;
