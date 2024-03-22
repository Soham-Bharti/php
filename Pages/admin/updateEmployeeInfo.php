<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../common/login.php');
}
$techErr = $joiningDateErr = $salaryErr = $joiningDateErr = $bondPeriodMonthsErr = $noticePeriodDaysErr = $noticePeriodErr = "";
$tech = $joiningDate = $salary = $joiningDate = $noticePeriodDays = $noticePeriodMonths = $bondPeriodYears = $bondPeriodMonths = "";

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];
// else if (isset($_POST['id'])) $desiredUserId = $_POST['id'];

if (isset($desiredUserId)) {
    $sql = "SELECT salary, technology_assigned, joining_date, bond_period, notice_period from employeeDetails where user_id = '$desiredUserId' and deleted_at is null";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $salary = $row['salary'];
            $tech = $row['technology_assigned'];
            $joining_date = $row['joining_date'];
            $bond_period = $row['bond_period'];
            $bond_period_years = explode(' ', $bond_period)[0];
            $bond_period_months = explode(' ', $bond_period)[2];

            $notice_period = $row['notice_period'];
            $notice_period_months = explode(' ', $notice_period)[0];
            $notice_period_days = explode(' ', $notice_period)[2];
        }
    }
} else {
    // echo "User Professional Info has more than 1 entry kindly check";
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$flag = true;
if (isset($_POST['update'])) {
    // print_r($_POST);
    $joiningDate = test_input($_POST['joiningDate']);
    $tech = test_input($_POST['tech']);
    $salary = test_input($_POST['salary']);
    $noticePeriodMonths = test_input($_POST['noticePeriodMonths']);
    $noticePeriodDays = test_input($_POST['noticePeriodDays']);
    $id = test_input($_POST['id']);


    if (isset($_POST['bondPeriodMonths']) || isset($_POST['bondPeriodYears'])) {
        $bondIsSet = true;
        $bondPeriodMonths = test_input($_POST['bondPeriodMonths']);
        $bondPeriodYears = test_input($_POST['bondPeriodYears']);
        if ($bondPeriodMonths >= 12) {
            $bondPeriodErr = '* Increase year when months are more than 11';
            $flag = false;
            $_SESSION['updateEmployeeInfoStatus'] = 'fail';
        }
    }

    if (empty($joiningDate) || $joiningDate == '') {
        $joiningDateErr = 'Required';
        $flag = false;
        $_SESSION['updateEmployeeInfoStatus'] = 'fail';
    } else {
        $sql = "SELECT created_at from users where id = '$id' and deleted_at is null order by created_at limit 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                $registrationDateTime = $row['created_at'];
                $registrationTimeStamp = strtotime($registrationDateTime);
                $registrationDate = date('Y-m-d', $registrationTimeStamp);
                // echo $registrationDate; 
            }
        } else {
            $_SESSION['updateEmployeeInfoStatus'] = 'fail';
            echo "No record found for the user, may be user is no more existing in db";
        };
        if ($registrationDate > $joiningDate) {
            $joiningDateErr = "Joining Date is earlier than Registration Date";
            $flag = false;
            $_SESSION['updateEmployeeInfoStatus'] = 'fail';
        }
    }

    if (empty($salary)) {
        $salaryErr = 'Required';
        $flag = false;
        $_SESSION['updateEmployeeInfoStatus'] = 'fail';
    }

    if (empty($noticePeriodDays) && empty($noticePeriodMonths)) {
        $noticePeriodErr = 'Required';
        $flag = false;
        $_SESSION['updateEmployeeInfoStatus'] = 'fail';
    } else if ($noticePeriodDays >= 30) {
        $noticePeriodErr = 'Increase month when days are more than 29';
        $flag = false;
        $_SESSION['updateEmployeeInfoStatus'] = 'fail';
    }

    if ($flag) {
        echo "Inside";
        // sending data to data base
        if ($noticePeriodDays == '') $noticePeriodDays = '0';
        if ($noticePeriodMonths == '') $noticePeriodMonths = '0';
        $noticePeriod = "$noticePeriodMonths months $noticePeriodDays days";

        if ($bondPeriodYears == '') $bondPeriodYears = '0';
        if ($bondPeriodMonths == '') $bondPeriodMonths = '0';
        $bondPeriod = "$bondPeriodYears years $bondPeriodMonths months";


        if ($bondIsSet) {
            $sql1 = "UPDATE employeeDetails set salary = '$salary', technology_assigned = '$tech', joining_date =  '$joiningDate', bond_period = '$bondPeriod', notice_period = '$noticePeriod', updated_at = now() where user_id = '$id' and deleted_at is null;";
        } else {
            $sql1 = "UPDATE employeeDetails set salary = '$salary', technology_assigned = '$tech', joining_date =  '$joiningDate', notice_period = '$noticePeriod', updated_at = now() where user_id = '$id' and deleted_at is null;";
        }

        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            // echo "<br>Record updated successfully<br>";
            // if everthing if well then redirecting the admin to ldashboard
            $_SESSION['updateEmployeeInfoStatus'] = 'success';
            header("Location: adminDashboard.php");
            // echo "Update success";
        } else {
            // echo "<br>Error occurred while updated into table : " . mysqli_error($conn); // Print any errors returned by MySQL
            $_SESSION['updateEmployeeInfoStatus'] = 'fail';
        }
        mysqli_close($conn); // Close the database connection

        // if everthing if well then redirecting the admin to ldashboard
        $_SESSION['updateEmployeeInfoStatus'] = 'success';
        header("Location: viewAllEmployees.php");
        // echo "Update success";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Professional Info</title>
    <link rel="stylesheet" href="../../Styles/updateemployee.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class = 'd-flex flex-column min-vh-100'>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="../common/home.php" class="svg text-decoration-none text-success d-flex align-items-center">
                <img src="../../Images/mainIcon.gif" alt='svg here'>
                <span class='fw-bold text-success'>EmployeeTracker.com</span>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="viewAllEmployees.php">Back</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-2"><span class='text-info'>Update</span> Employees' Professional Details</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <!-- toast after fail updation -->
            <?php if (isset($_SESSION['updateEmployeeInfoStatus']) && $_SESSION['updateEmployeeInfoStatus'] == 'fail') { ?>
                <div class="toast show m-auto hide">
                    <div class="toast-header bg-danger text-white ">
                        <strong class="me-auto">Something went wrong!</strong>
                        <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            <?php }
            $_SESSION['updateEmployeeInfoStatus'] = '' ?>
            <div class="my-3 d-flex align-items-center justify-content-around gap-4">
                <?php
                $sql = "select name, profile_url, email from users where id = '$desiredUserId' and deleted_at is null";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $profile = $row['profile_url'];
                        if (empty($profile)) $profile = 'defaultImg.webp';
                    }
                }
                ?>
                <div class="d-inline-block profile-img w-25">
                    <img src="<?php echo "../../Images/" . $profile ?>" alt="No profile to show" class="img-thumbnail object-fit-contain border rounded-circle  mb-2">
                </div>
                <div class='text-center'>
                    <p>Emp ID: <span class="fw-bold text-secondary"><?php echo $desiredUserId ?></span></p>
                    <p class="fw-bold text-secondary"><?php echo $name ?></p>
                    <p class="fw-bold text-secondary"><?php echo $email ?></p>
                </div>
            </div>
            <hr>
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Joining Date <span>* <?php echo $joiningDateErr ?></span></label>
                    <input type="date" name="joiningDate" class="form-control" placeholder="9876543210" maxlength="10" value='<?php echo $joining_date ?>'>
                </div>

                <div class="mb-3">
                    <div class="col-auto">
                        <label for="tech" class="col-form-label" checked='<?php echo $tech ?>'>Tech <span>* <?php echo $techErr ?></span></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="android" <?php echo $tech == 'android' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="tech">Android</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="ios" <?php echo $tech == 'ios' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="tech">IOS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="php" <?php echo $tech == 'php' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="tech">PHP</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tech" value="reactNative" <?php echo $tech == 'reactNative' ? 'checked' : '' ?> />
                        <label class="form-check-label" for="tech">React Native</label>
                    </div>

                </div>



                <div class="mb-3">
                    <label class="form-label">Salary <span>* <?php echo $salaryErr ?></span></label>
                    <input type="number" min="0.00" max="1000000.00" step="0.10" class="form-control" name="salary" value='<?php echo $salary ?>'>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bond Period</label>
                    <div class='d-flex gap-3 align-items-center justify-content-around'>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Years:</label>
                            <input type="number" class="form-control" name="bondPeriodYears" value="<?php echo $bond_period_years ?>">
                        </div>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Months: <span><?php echo $bondPeriodMonthsErr ?></span></label>
                            <input type="number" class="form-control" name="bondPeriodMonths" value="<?php echo $bond_period_months ?>">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notice Period <span>* <?php echo $noticePeriodErr ?></span></label>
                    <div class='d-flex gap-3 align-items-center justify-content-around'>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Months:</label>
                            <input type="number" class="form-control" name="noticePeriodMonths" value="<?php echo $notice_period_months ?>">
                        </div>
                        <div class='d-flex gap-1 align-items-center'>
                            <label class="form-label">Days: <span><?php echo $noticePeriodDaysErr ?></span></label>
                            <input type="number" class="form-control" name="noticePeriodDays" value="<?php echo $notice_period_days ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" value='<?php echo $desiredUserId ?>'>
                </div>
                <div class="buttons">
                    <input type="submit" name="update" class="btn btn-dark btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>

    <!-- footer here -->
    <?php include('../views/footer.php');?>
    <!-- footer ends -->

</body>

</html>