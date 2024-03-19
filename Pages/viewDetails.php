<?php
session_start();
require '../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'emp') {
    header('Location: login.php');
}

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];

if (isset($desiredUserId)) {
    $sql = "SELECT 
    SUM(TIMESTAMPDIFF(SECOND, e.check_in_time, e.check_out_time)) AS total_seconds,
    u.name, 
    u.mobile, 
    u.date_of_birth, 
    u.gender, 
    u.city, 
    u.state, 
    u.email, 
    u.profile_url,
    ed.salary, 
    ed.technology_assigned, 
    ed.joining_date, 
    ed.bond_period, 
    ed.notice_period 
FROM 
    users u
LEFT JOIN 
    employeeTrackingDetails e ON u.id = e.user_id
LEFT JOIN 
    employeeDetails ed ON u.id = ed.user_id
WHERE 
    e.user_id = '$desiredUserId' 
    AND u.deleted_at IS NULL
    AND MONTH(check_in_time) = MONTH(now())
GROUP BY 
    u.id, ed.user_id;";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $profile = $row['profile_url'];
            if (empty($profile)) {
                $profile = '../Images/defaultImg.webp';
            }
            $gender = $row['gender'];
            $city = $row['city'];
            $state = $row['state'];
            $dob = $row['date_of_birth'];
            $tech = $row['technology_assigned'];
            $total_seconds = $row['total_seconds'];
            $joining_date = $row['joining_date'];
            $salary = $row['salary'];
            if (empty($salary)) $salary = 'N/A';
            $bond_period = $row['bond_period'];
            if (empty($bond_period)) {
                $bond_period_years = 'N/A';
                $bond_period_months = 'N/A';
            } else {
                $bond_period_years = explode(' ', $bond_period)[0];
                $bond_period_months = explode(' ', $bond_period)[2];
            }
            $notice_period = $row['notice_period'];
            if (empty($notice_period)) {
                $notice_period_months = 'N/A';
                $notice_period_days = 'N/A';
            } else {
                $notice_period_months = explode(' ', $notice_period)[0];
                $notice_period_days = explode(' ', $notice_period)[2];
            }

            // seconds to hours, minutes and seconds
            $hours = floor($total_seconds / 3600);
            $minutes = floor(($total_seconds % 3600) / 60);
            $seconds = $total_seconds % 60;
            $formatted_time = sprintf("%02d Hours %02d Minutes %02d Seconds", $hours, $minutes, $seconds);
        }
    }
} else {
    echo "User Id not set!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo explode(' ', $name)[0] ?> - Details</title>
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
                        <a class="nav-link" href="userDashboard.php">Back</a>
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
    <h2 class="text-center mt-2"><span class='text-info'><?php echo $name?></span> - All Details</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <div class="my-3 d-flex align-items-center justify-content-around gap-4">
                <div class="d-inline-block profile-img w-25">
                    <img src="<?php echo "../Images/" . $profile ?>" alt="No profile to show" class="img-thumbnail object-fit-contain border rounded-circle  mb-2">
                </div>
                <div class='text-center'>
                    <p>Emp ID: <span class="fw-bold text-secondary"><?php echo $desiredUserId ?></span></p>
                    <p class="fw-bold text-secondary"><?php echo $name ?></p>
                    <p class="fw-bold text-secondary"><?php echo $mobile ?></p>
                    <p class="fw-bold text-secondary"><?php echo $email ?></p>
                </div>
            </div>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25 text-center">Total Working (current month) - </label>
                    <label class="form-label w-50 text-center fw-bold text-success"><?php echo $formatted_time ?></label>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">DoB - </span></label>
                    <input type="text" name="dob" class="form-control w-25" disabled value='<?php echo $dob ?>'>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">City - </span></label>
                    <input type="text" name="city" class="form-control w-25" disabled value='<?php echo ucfirst($city) ?>'>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">State - </span></label>
                    <input type="text" name="state" class="form-control w-25" disabled value='<?php echo ucfirst($state) ?>'>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">Gender - </span></label>
                    <input type="text" name="dob" class="form-control w-25" disabled value='<?php echo ucfirst($gender) ?>'>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">Joining Date - </span></label>
                    <input type="date" name="joiningDate" class="form-control w-25" disabled value='<?php echo $joining_date ?>'>
                </div>

                <div class="mb-3 d-flex align-items-center justify-content-center gap-3">
                    <div class="col-auto">
                        <label for="tech" class="col-form-label" checked='<?php echo $tech ?>'>Tech Assigned:</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="android" <?php echo $tech == 'android' ? 'checked' : 'disabled' ?> />
                        <label class="form-check-label" for="tech">Android</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="ios" <?php echo $tech == 'ios' ? 'checked' : 'disabled' ?> />
                        <label class="form-check-label" for="tech">IOS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="php" <?php echo $tech == 'php' ? 'checked' : 'disabled' ?> />
                        <label class="form-check-label" for="tech">PHP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="reactNative" <?php echo $tech == 'reactNative' ? 'checked' : 'disabled' ?> />
                        <label class="form-check-label" for="tech">React Native</label>
                    </div>

                </div>



                <div class="mb-3 d-flex align-items-center justify-content-center">
                    <label class="form-label w-25">Salary (in Rupees) - </span></label>
                    <input type="text" min="0.00" max="1000000.00" step="0.10" class="form-control w-25" name="salary" disabled value='<?php echo $salary ?>'>
                </div>

                <div class="mb-3 d-flex align-items-center justify-content-center gap-2">
                    <label class="form-label">Bond Period - </label>
                    <div class='d-flex gap-3 align-items-center justify-content-around'>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Years:</label>
                            <input type="text" class="form-control" disabled name="bondPeriodYears" value="<?php echo $bond_period_years ?>">
                        </div>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Months:</label>
                            <input type="text" class="form-control" disabled name="bondPeriodMonths" value="<?php echo $bond_period_months ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-center justify-content-center gap-2">
                    <label class="form-label">Notice Period - </label>
                    <div class='d-flex gap-3 align-items-center justify-content-around'>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Months:</label>
                            <input type="text" class="form-control" disabled name="noticePeriodMonths" value="<?php echo $notice_period_months ?>">
                        </div>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Days:</label>
                            <input type="text" class="form-control" disabled name="noticePeriodDays" value="<?php echo $notice_period_days ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" value='<?php echo $desiredUserId ?>'>
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