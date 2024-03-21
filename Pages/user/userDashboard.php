<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'emp') {
    header('Location: ../common/login.php');
}
if (isset($_SESSION['id'])) {
    $desiredUserId = $_SESSION['id'];
} else header('Location: ../common/home.php');

if (isset($_POST['check-in-submit'])) {
    echo 'check-in-submit clicked';
    header('Location: check-in.php');
    // print_r($_SESSION);
}
if (isset($_POST['check-out-submit'])) {
    echo 'check-out-submit clicked';
    header('Location: check-out.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | <?php echo $_SESSION['userName']; ?> </title>
    <link rel="stylesheet" href="../../Styles/userdashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class='d-flex flex-column min-vh-100'>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="../common/home.php" class="svg text-decoration-none d-flex align-items-center">
                <img src="../../Images/mainIcon.gif" alt='svg here'>
                <span class='text-success fw-bold'>EmployeeTracker.com</span>
            </a>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../common/login.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="changePassword.php">Change Password</a>
                </li>
                <li class="nav-item">
                    <a href="workingHours.php?id=<?php echo $desiredUserId ?>" class="nav-link">Working Track</a>
                </li>
                <li class="nav-item">
                    <a href="viewDetails.php?id=<?php echo $desiredUserId ?>" class="nav-link">View Details</a>
                </li>
                <li class="nav-item">
                    <a href="viewProjects.php?id=<?php echo $desiredUserId ?>" class="nav-link">My Projects</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-3">Welcome to the <span class='text-info'>User</span> dashboard</h2>
    <?php
    $showStatus = '';
    $sql = "SELECT check_out_time from employeeTrackingDetails where user_id = '$desiredUserId' order by check_in_time desc limit 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $checkOut = $row["check_out_time"];
            is_null($checkOut) ? $showStatus = 'check-in' : $showStatus = 'check-out';
        }
    }
    ?>
    <?php
    if ($showStatus === 'check-in') {
    ?>
        <h4 class="text-center mt-3">You are currently <span class='text-success'><?php echo $showStatus ?></span></h4>
    <?php } else if ($showStatus === 'check-out') {
    ?>
        <h4 class="text-center mt-3">You are currently <span class='text-danger'><?php echo $showStatus ?></span></h4>
    <?php } else { ?>
        <h4 class="text-center mt-3">Do your <span class='text-warning'>FIRST</span> check-in!</h4>
    <?php } ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class='fs-4'>
                <?php
                $user = $_SESSION['userName'];
                $userId = $_SESSION['id'];
                echo "Emp Id: <b>" . $userId . "</b> | " . $user;
                ?>
            </div>
            <div class="buttons d-flex justify-content-between align-items-center">
                <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
                    <input type="submit" name="check-in-submit" class="btn btn-primary btn-lg <?php echo $showStatus === 'check-in' ? "disabled cursor-not-allowed" : '' ?>" value="Check-in">
                    <input type="submit" name="check-out-submit" class="btn btn-danger btn-lg <?php echo $showStatus === 'check-in' ? '' : "disabled cursor-not-allowed" ?>" value='Check-out'>
                </form>
            </div>
        </div>
        <!-- toast after successful change of password -->
        <?php if ($_SESSION['userChangePasswordStatus'] == 'success') { ?>
            <div class="toast show m-auto hide">
                <div class="toast-header bg-success text-white ">
                    <strong class="me-auto">Password changed successfully!</strong>
                    <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php } $_SESSION['userChangePasswordStatus'] = '' ?>
        <!-- toast ends -->
        <!-- toast after successful check-in -->
        <?php if (isset($_SESSION['checkInMessage']) && $_SESSION['checkInMessage'] == 'success') { ?>
            <div class="toast show m-auto hide">
                <div class="toast-header bg-success text-white ">
                    <strong class="me-auto">You are Checked-in successfully!</strong>
                    <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php } $_SESSION['checkInMessage'] = '' ?>
        <!-- toast ends -->
        <!-- toast after successful check-in -->
        <?php if (isset($_SESSION['checkOutMessage']) && $_SESSION['checkOutMessage'] == 'success') { ?>
            <div class="toast show m-auto hide">
                <div class="toast-header bg-warning text-white ">
                    <strong class="me-auto">You are Checked-out successfully!</strong>
                    <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php } $_SESSION['checkOutMessage'] = '' ?>
        <!-- toast ends -->
        <!-- toast after fail check-in -->
        <?php if (isset($_SESSION['checkInLimitMessage']) && $_SESSION['checkInLimitMessage'] == 'success') { ?>
            <div class="toast show m-auto hide">
                <div class="toast-header bg-danger text-white ">
                    <strong class="me-auto">Check-in limit reached!</strong>
                    <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
                </div>
            </div>
        <?php } $_SESSION['checkInLimitMessage'] = ''; ?>
        <!-- toast ends -->
        <h2 class="text-center mt-5">Showing <span class='text-success'>LAST 10</span> tracks</h2>
        <div class="mt-3">
            <table>
                <tr>
                    <th>S.Number</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                </tr>
                <?php
                $sql = "SELECT check_in_time, check_out_time from employeeTrackingDetails where user_id = $desiredUserId order by check_in_time desc limit 10";
                $result = mysqli_query($conn, $sql);
                $seialNumber = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $flag = false;
                        $checkOut = $row["check_out_time"];
                ?>
                        <?php
                        $time = strtotime($row["check_in_time"]);
                        $checkInTime = strtotime($row["check_in_time"]);
                        if (is_null($checkOut)) {
                            $checkOutIsNull = true;
                        } else {
                            $checkOutTime = strtotime($row["check_out_time"]);
                            $checkOutIsNull = false;
                        };
                        ?>
                        <tr>
                            <td><?php echo $seialNumber++ ?></td>
                            <td><?php
                                echo date('d M Y', $time);
                                ?></td>
                            <td><?php
                                echo date('l', $time);
                                ?>
                            </td>
                            <td>
                                <?php
                                echo date('H:i:s', $checkInTime);
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($checkOutIsNull) {
                                    echo " -- ";
                                } else {
                                    echo date('H:i:s', $checkOutTime);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <h2 class="text-center mt-5">Oops! <span class='text-danger text-center'>NO</span> track found!</h2>
                <?php }
                ?>
            </table>
        </div>
    </div>

    <!-- footer here -->
    <?php include('../views/footer.php'); ?>
    <!-- footer ends -->

</body>

</html>