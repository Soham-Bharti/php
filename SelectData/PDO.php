<?php
require '../DbConnect/PDOconnection.php';

try {
    $stmt = $conn->prepare("SELECT * FROM myGuest3");
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

$conn = null;
