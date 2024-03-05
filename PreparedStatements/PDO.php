<?php
require '../DbConnect/PDOconnection.php';
// var_dump($conn);

try {
    $preparedStatement = $conn->prepare("INSERT INTO myGuest3(first_name, last_name, email) values (:first_name,:last_name, :email)");
    $preparedStatement->bindParam(':first_name', $firstName);
    $preparedStatement->bindParam(':last_name', $lastName);
    $preparedStatement->bindParam(':email', $email);

    $firstName = 'Pinto';
    $lastName = 'Shukla';
    $email = "pintoshukla@gmail.com";
    $preparedStatement->execute();

    $firstName = 'Pinto2';
    $lastName = 'Shukla2';
    $email = "pintoshukla2@gmail.com";
    $preparedStatement->execute();

    $firstName = 'Pinto3';
    $lastName = 'Shukla3';
    $email = "pintoshukla3@gmail.com";
    $preparedStatement->execute();

    echo "New records inserted successfully!";
} catch (PDOException $e) {
    echo "Error occurred while inserting multiple rows " . $e->getMessage();
}
// 1	Amaresh	Sharma	amaresh8898@gmail.com	2024-03-05 12:37:02
// 2	Shubham	Thakur	thak009shubh@gmail.com	2024-03-05 12:37:31
// 4	Shubham	Thakur	thakq009shubh@gmail.com	2024-03-05 12:37:58
// 6	Kamal	Neel	nks@gmail.com	2024-03-05 12:44:23
// 8	P	K	pk.silversky@gmail.com	2024-03-05 13:02:35
// 9	R	S	rs.silversky@gmail.com	2024-03-05 13:02:35
// 10	D	S	ds.silversky@gmail.com	2024-03-05 13:02:35
// 11	Pinto	Shukla	pintoshukla@gmail.com	2024-03-05 13:28:20
// 12	Pinto2	Shukla2	pintoshukla2@gmail.com	2024-03-05 13:28:20
// 13	Pinto3	Shukla3	pintoshukla3@gmail.com	2024-03-05 13:28:20
$stmt->close();
$conn = null;
