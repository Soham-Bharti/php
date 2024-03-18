<?php
session_start();
require '../config/dbConnect.php';
if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
}
if (isset($_GET['id'])) $desiredUserId = $_GET['id'];

$checkInTime = $date = $day = "";
$checkOutTime = null;
$checkInTimeErr = $dateErr = "";

$flag = true;
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $checkInTime = $_POST['checkInTime'];
    $checkOutTime = $_POST['checkOutTime'];

    if (empty($date)) {
        $dateErr = 'Required';
        $flag = false;
    }

    if (empty($checkInTime)) {
        $checkInTimeErr = 'Required';
        $flag = false;
    }
    if ($flag) {

        if (is_null($checkOutTime) || $checkOutTime == '') {
            $sql = "INSERT INTO employeeTrackingDetails(user_id, check_in_time) values('$desiredUserId', '$date $checkInTime')";
            if (mysqli_query($conn, $sql)) {
                // echo "Success 1";
            } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        } else {
            $sql = "INSERT INTO employeeTrackingDetails(user_id, check_in_time, check_out_time) values('$desiredUserId', '$date $checkInTime', '$date $checkOutTime')";
            if (mysqli_query($conn, $sql)) {
                // echo "Success 2";
            } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        }

        mysqli_close($conn);
        $_SESSION['AddEmpTrackStatus'] = 'success';
        $desiredLocation = "trackEmployee.php?id=$desiredUserId";
        header("Location: $desiredLocation");
    } else echo "THERE WAS AN ERROR adding new employee track";
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Track</title>
    <link rel="stylesheet" href="../Styles/addEmployee.css">
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
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-2">New <span class='text-info'>Employee Track</span></h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="col-form-label">Date<span>* <?php echo $dateErr ?></span></label>
                    <div class="mb-3">
                        <input type="date" name="date" class="form-control user-select-none" max="<?php echo $date = date("Y-m-d") ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Check In Time<span>* <?php echo $checkInTimeErr ?></span></label>
                    <input type="time" name="checkInTime" class="form-control">
                </div>
                <div class="mb-3 timepicker">
                    <label class="form-label">Check Out Time</label>
                    <input type="time" name="checkOutTime" class="form-control">
                </div>

                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Add Track">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>


    <footer class="d-flex flex-wrap justify-content-between align-items-center m-3 p-3 border-top">
        <p class="mb-0 text-body-secondary">Copyright &copy; 2023 - <?php echo date("Y") ?>, All Rights Reserved</p>

        <a href="home.php" class="col-1 svg">
            <img src="../Images/emp.svg" alt='svg here'>
        </a>

        <p class=" mb-0 text-body-secondary">Handcrafted & Made with ❤️ - <a href="https://soham-bharti.netlify.app/" target="_blank" class='fw-bold text-decoration-none cursor-pointer text-danger'>Soham Bharti</a></p>

    </footer>

</body>

</html>