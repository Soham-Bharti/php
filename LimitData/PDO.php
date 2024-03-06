<?php
require '../DbConnect/PDOconnection.php';

try {
    $stmt = $conn->prepare("SELECT * from myGuest3 limit 5");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $x => $y) {
        // print_r($y);
        foreach ($y as $a => $b) {
            echo $b . "<br>";
        }
    }
} catch (PDOException $e) {
    echo "Error occurred while fetching record!" . $e->getMessage();
}
// 1
// Amaresh
// Sharma
// amaresh8898@gmail.com
// 2024-03-05 12:37:02
// 4
// Shubham
// Thakur
// thakq009shubh@gmail.com
// 2024-03-05 12:37:58
// 6
// Kamal
// Neel
// nks@gmail.com
// 2024-03-05 12:44:23
// 8
// P
// K
// pk.silversky@gmail.com
// 2024-03-05 13:02:35
// 9
// R
// BHARTI
// rs.silversky@gmail.com
// 2024-03-05 15:43:45
$conn = null;
