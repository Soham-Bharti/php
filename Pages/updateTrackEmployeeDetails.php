<?php
session_start();
require '../config/dbConnect.php';
// print_r($_SESSION);

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];
if (isset($_GET['trackId'])) $desiredTrackId = $_GET['trackId'];

$checkInTime = "";
$checkOutTime = null;
$checkInTimeErr = $checkOutTimeErr = "";

if (isset($desiredUserId) && isset($desiredTrackId)) {
    $sql = "SELECT check_in_time, check_out_time from employeeTrackingDetails where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo "created at: ". $row['created_at'] . "<br>";
            $originalDate = explode(' ', $row['check_in_time'])[0];
            // echo "$originalDate";
            $dateTime = strtotime($row['check_in_time']);
            $date = date('d M Y', $dateTime);
            $day = date('l', $dateTime);
            // echo "check in time: " . $row['check_in_time'] . "<br>";
            $inTime = explode(' ', $row['check_in_time']);
            $checkInTime = end($inTime);
            // echo "check out time: " . $row['check_out_time'] . "<br>";
            if (!is_null($row['check_out_time'])) {
                $outTime = explode(' ', $row['check_out_time']);
                $checkOutTime = end($outTime);
            }
        }
    }
}


if (isset($_POST['submit'])) {
    // print_r($_POST);
    $checkInTime = $_POST['checkInTime'];
    $checkOutTime = $_POST['checkOutTime'];
    var_dump($checkOutTime);
    if ($checkOutTime != '') {
        // sending data to data base  
        $sql2 = "UPDATE employeeTrackingDetails set check_in_time = '$originalDate $checkInTime', check_out_time = '$originalDate $checkOutTime', updated_at = now() where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
        if (mysqli_query($conn, $sql2)) {
            echo "<br>Record updated successfully<br>";
        } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);

        // echo "Successfully updated with check out time";
    } else {
        $sql2 = "UPDATE employeeTrackingDetails set check_in_time = '$originalDate $checkInTime', updated_at = now() where user_id = '$desiredUserId' and id = '$desiredTrackId' and deleted_at is null";
        if (mysqli_query($conn, $sql2)) {
            echo "<br>Record updated successfully<br>";
        } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);

        // echo "Successfully updated without checkout time";
    }
    mysqli_close($conn);
    $_SESSION['UpdateEmpTrackStatus'] = 'success';
    $desiredLocation = "trackEmployee.php?id=$desiredUserId";
    header("Location: $desiredLocation");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Track</title>
    <link rel="stylesheet" href="../Styles/updateemployee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://soham-bharti.netlify.app/" target="_blank">Employee Tracker WebApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="trackEmployee.php?id=<?php echo $desiredUserId ?>">Back</a>
                    </li>
                    <li class="nav-item">
                        <!-- Here http://localhost/php_training/Pages is static for the moment -->
                        <a class="nav-link" aria-current="page" href="adminDashboard.php">Dashboard</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-2"><span class='text-info'>Update</span> Employee Tracking Details</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="col-form-label">Date</label>
                    <div class="mb-3">
                        <input type="text" name="date" class="form-control user-select-none" value='<?php echo $date ?>' disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Day</label>
                    <input type="text" class="form-control user-select-none" name="day" value='<?php echo $day ?>' disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Check In Time<span>* <?php echo $checkInTimeErr ?></span></label>
                    <input type="time" name="checkInTime" class="form-control" placeholder="10:10:10" maxlength="8" value='<?php echo $checkInTime ?>'>
                </div>
                <div class="mb-3 timepicker">
                    <label class="form-label">Check Out Time<span>* <?php echo $checkOutTimeErr ?></span></label>
                    <input type="time" name="checkOutTime" class="form-control" placeholder="10:10:10" maxlength="8" value='<?php echo is_null($checkOutTime) ? '--' : $checkOutTime ?>'>
                </div>

                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>

        <footer class="d-flex flex-wrap justify-content-between align-items-center m-3 p-3 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 - <?php echo date("Y") ?> Made with ❤️ - <span class='fw-bold'>Soham Bharti</span></p>

            <a href="home.php" class="col-1 svg">
                <img src="../Images/emp.svg" alt='svg here'>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
        </footer>

</body>

</html>