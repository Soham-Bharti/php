<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
}
if (isset($_GET['id'])) $desiredUserId = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emplpoyee Working | Admin</title>
    <link rel="stylesheet" href="../../Styles/userdashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="../home.php" class="svg text-decoration-none text-success d-flex align-items-center">
                <img src="../../Images/mainIcon.gif" alt='svg here'>
                <span class='fw-bold text-success'>EmployeeTracker.com</span>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="adminDashboard.php">Back</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-3">Employee <span class='text-info'>Working Hours'</span> dashboard</h2>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class='fs-4'>
                <?php
                $sql = "SELECT name from users where id='$desiredUserId' and deleted_at is null;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $userName = $row['name'];
                    }
                }
                echo "Emp Id: " . $desiredUserId . " | " . $userName;
                ?>
            </div>
            <div>
                <?php
                $showStatus = '';
                $sql = "SELECT check_out_time from employeeTrackingDetails where user_id = '$desiredUserId' and deleted_at is null order by check_in_time desc limit 1";
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
                    <h4 class="text-center mt-3">Emp is currently <span class='text-success'><?php echo $showStatus ?></span></h4>
                <?php } else if ($showStatus === 'check-out') {
                ?>
                    <h4 class="text-center mt-3">Emp is currently <span class='text-danger'><?php echo $showStatus ?></span></h4>
                <?php } else { ?>
                    <h4 class="text-center mt-3">Emp will do <span class='text-warning'>FIRST</span> check-in!</h4>
                <?php } ?>
            </div>
        </div>

        <h2 class="text-center mt-5">Showing <span class='text-success'>LAST 10</span> tracks</h2>
        <div class="mt-3">
            <table>
                <tr class="text-dark">
                    <th>S.Number</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Working Hours</th>
                </tr>
                <?php
                $sql = "SELECT
                DATE(check_in_time) AS date,
                SUM(TIMESTAMPDIFF(SECOND, check_in_time, check_out_time)) AS total_seconds
            FROM
                employeeTrackingDetails
            WHERE
                user_id = '$desiredUserId' and deleted_at is null
            GROUP BY
                DATE(check_in_time)
            ORDER BY
                DATE(check_in_time) DESC;
            ";
                $result = mysqli_query($conn, $sql);
                $seialNumber = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dateTime = $row["date"];
                        $time = strtotime($dateTime);
                        $total_seconds = $row['total_seconds'];
                ?>
                        <?php
                        // seconds to hours, minutes and seconds
                        $hours = floor($total_seconds / 3600);
                        $minutes = floor(($total_seconds % 3600) / 60);
                        $seconds = $total_seconds % 60;
                        $formatted_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
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
                            <td class='fw-bold <?php echo $formatted_time > '08:45:00' ? 'text-success' : 'text-danger' ?>'>
                                <?php
                                echo "$formatted_time";
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
    <?php include('../views/footer.php');?>
    <!-- footer ends -->

</body>

</html>