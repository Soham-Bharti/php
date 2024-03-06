<?php
require '../DbConnect/proceduralConnection.php';

$sql = "SELECT * from myGuest2 limit 5";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<br> id: <b>" . $row['id'] . "</b>- First Name: " . $row['first_name'] . "- Last Name: " . $row['last_name'] . "- Email: " . $row['email'];
   }
} else echo "Unable to get row!";
// id: 1- First Name: Amaresh- Last Name: Sharma- Email: amaresh8898@gmail.com
// id: 2- First Name: Tinku- Last Name: Jiya- Email: tt@gmail.com
// id: 4- First Name: R- Last Name: BHARTI- Email: rs.silversky@gmail.com
// id: 5- First Name: D- Last Name: S- Email: ds.silversky@gmail.com
// id: 7- First Name: Pinto- Last Name: Shukla- Email: pintoshukla@gmail.com
mysqli_close($conn);
