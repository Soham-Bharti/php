<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role' == 'emp']) {
    header('Location: ../common/login.php');
}
    if (isset($_GET['id'])) $desiredProjectId = $_GET['id'];
    if (isset($desiredProjectId)) {
        // $sql = "DELETE from users where id = '$desiredUserId'";
        // updating the deleted_at time to current timestamp in database so that user will still be present in the db
        $sql  = "UPDATE projects SET deleted_at = now() WHERE id = '$desiredProjectId';";
        // $sql  = "DELETE from projects WHERE id = '$desiredProjectId';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "Successfully deleted the record";
            $_SESSION['ProjectDeleteStatus'] = 'success';
            mysqli_close($conn);
            // if everthing if well then redirecting the user to login page
            header("Location: viewAllProjects.php");
        }
    } else {
        echo "ID parameter is missing - check your session";
    }

