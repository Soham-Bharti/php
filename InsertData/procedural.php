<?php
require '../DbConnect/proceduralConnection.php';
// var_dump($conn);
$sql = "INSERT INTO myGUEST2(first_name, last_name, email) 
values('Amaresh', 'Sharma', 'amaresh8898@gmail.com')";

if (mysqli_query($conn, $sql))  echo "<br>New record inserted successfully<br>";
else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);

mysqli_close($conn);