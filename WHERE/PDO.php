<?php
require '../DbConnect/PDOconnection.php';

try {
    $stmt = $conn->prepare("SELECT * FROM myGuest3 where last_name like '%a'");
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach($stmt->fetchAll() as $x=>$y){
        // print_r($y);
        foreach($y as $a=>$b){
            echo $b."<br>";
        }
    }
} catch (PDOException $e) {
    echo "Error occurred while fetching rows " . $e->getMessage();
}
// 1
// Amaresh
// Sharma
// amaresh8898@gmail.com
// 2024-03-05 12:37:02
// 11
// Pinto
// Shukla
// pintoshukla@gmail.com
// 2024-03-05 13:28:20
$conn = null;
