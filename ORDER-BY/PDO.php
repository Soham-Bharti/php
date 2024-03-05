<?php
require '../DbConnect/PDOconnection.php';

try {
    $stmt = $conn->prepare("SELECT * FROM myGuest3 order by last_name");
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
// 8
// P
// K
// pk.silversky@gmail.com
// 2024-03-05 13:02:35
// 6
// Kamal
// Neel
// nks@gmail.com
// 2024-03-05 12:44:23
// 9
// R
// S
// rs.silversky@gmail.com
// 2024-03-05 13:02:35
// 10
// D
// S
// ds.silversky@gmail.com
// 2024-03-05 13:02:35
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
// 12
// Pinto2
// Shukla2
// pintoshukla2@gmail.com
// 2024-03-05 13:28:20
// 13
// Pinto3
// Shukla3
// pintoshukla3@gmail.com
// 2024-03-05 13:28:20
// 2
// Shubham
// Thakur
// thak009shubh@gmail.com
// 2024-03-05 12:37:31
// 4
// Shubham
// Thakur
// thakq009shubh@gmail.com
// 2024-03-05 12:37:58
$conn = null;
