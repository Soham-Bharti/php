<?php
require '../DbConnect/proceduralConnection.php';

$sql = "SELECT * from myGuest2 order by email";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br> id: <b>" . $row['id'] . "</b>- First Name: " . $row['first_name'] . "- Last Name: " . $row['last_name'] . "- Email: " . $row['email'];
    }
} else echo "0 rows returned!";
// id: 1- First Name: Amaresh- Last Name: Sharma- Email: amaresh8898@gmail.com
// id: 5- First Name: D- Last Name: S- Email: ds.silversky@gmail.com
// id: 7- First Name: Pinto- Last Name: Shukla- Email: pintoshukla@gmail.com
// id: 8- First Name: Pinto2- Last Name: Shukla2- Email: pintoshukla2@gmail.com
// id: 9- First Name: Pinto3- Last Name: Shukla3- Email: pintoshukla3@gmail.com
// id: 3- First Name: P- Last Name: K- Email: pk.silversky@gmail.com
// id: 4- First Name: R- Last Name: S- Email: rs.silversky@gmail.com
// id: 2- First Name: Tinku- Last Name: Jiya- Email: tt@gmail.com
mysqli_close($conn);
