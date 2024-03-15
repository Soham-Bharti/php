<?php
session_start();
require '../config/dbConnect.php';

if (isset($_SESSION['empUserId'])) {
    $desiredUserId = $_SESSION['empUserId'];
    // $sql = "DELETE from users where id = '$desiredUserId'";
    // updating the deleted_at time to current timestamp in database so that user will still be present in the db
    $sql  = "UPDATE users SET deleted_at = now() WHERE id = '$desiredUserId';";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Successfully deleted the record";
        $_SESSION['DeleteStatus'] = 'success'; 
        mysqli_close($conn);
        // if everthing if well then redirecting the user to login page
        header("Location: adminDashboard.php");
    }
} else {
    echo "ID parameter is missing - check your session";
}

?>

