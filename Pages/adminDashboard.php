<?php
session_start();
require '../config/dbConnect.php';

// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="../Styles/adminDashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="home.php" class="svg text-decoration-none text-success d-flex align-items-center">
                <img src="../Images/mainIcon.gif" alt='svg here'>
                <span class='fw-bold text-success'>EmployeeTracker.com</span>
            </a>

                <ul class="navbar-nav mb-2 me-auto mb-lg-0">
                    <li class="nav-item">
                        <!-- Here http://localhost/php_training/Pages is static for the moment -->
                        <!-- <a class="nav-link" aria-current="page" href="<?php echo "http://localhost/php_training/Pages" ?>">Home</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
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
    <h2 class="text-center mt-3">Welcome to the <span class='text-info'>admin</span> dashboard</h2>

    <!-- toast after successful added -->
    <?php if (isset($_SESSION['AddStatus']) && $_SESSION['AddStatus'] == 'success') { ?>
        <div class="toast show m-auto hide">
            <div class="toast-header bg-success text-white ">
                <strong class="me-auto">Record added successfully!</strong>
                <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php }
    $_SESSION['AddStatus'] = '' ?>
    <!-- toast after successful update -->
    <?php if (isset($_SESSION['UpdateStatus']) && $_SESSION['UpdateStatus'] == 'success') { ?>
        <div class="toast show m-auto hide">
            <div class="toast-header bg-warning text-white">
                <strong class="me-auto">Record updated successfully!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php }
    $_SESSION['UpdateStatus'] = '' ?>
    <!-- toast after successful delete -->
    <?php if (isset($_SESSION['DeleteStatus']) && $_SESSION['DeleteStatus'] == 'success') { ?>
        <div class="toast show m-auto hide">
            <div class="toast-header bg-danger text-white ">
                <strong class="me-auto">Record deleted successfully!</strong>
                <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php }
    $_SESSION['DeleteStatus'] = '' ?>
    <!-- toast after successful addEmployeeInfo professional -->
    <?php if (isset($_SESSION['addEmployeeInfoStatus']) && $_SESSION['addEmployeeInfoStatus'] == 'success') { ?>
        <div class="toast show m-auto hide">
            <div class="toast-header bg-success text-white ">
                <strong class="me-auto">Info added successfully!</strong>
                <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php }
    $_SESSION['addEmployeeInfoStatus'] = '' ?>
    <!-- toast after successful updateEmployeeInfo professional -->
    <?php if (isset($_SESSION['updateEmployeeInfoStatus']) && $_SESSION['updateEmployeeInfoStatus'] == 'success') { ?>
        <div class="toast show m-auto hide">
            <div class="toast-header bg-info text-white ">
                <strong class="me-auto">Info updated successfully!</strong>
                <button type="button" class="btn-close btn btn-light" data-bs-dismiss="toast"></button>
            </div>
        </div>
    <?php }
    $_SESSION['updateEmployeeInfoStatus'] = '' ?>

    <div class="container mt-5 px-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class='fs-4'>
                <?php
                if (isset($_SESSION['userName'])) {
                    $user = $_SESSION['userName'];
                    echo "Admin: <b>" . ucwords($user) . "</b>";
                } else {
                    echo "Session expired - login again to see your details";
                    header("Location: login.php");
                }
                ?>
            </div>
            <div class="buttons d-flex justify-content-between gap-3 align-items-center">
                <!-- <form action="addEmployee.php" method="POST">
                    <input type="submit" name="add-submit" class="btn btn-success btn-lg" value="Add Employee">
                </form> -->
                <a href="addEmployee.php" class="btn btn-success btn-lg">Add Employee</a>
            </div>
        </div>
        <h2 class="text-center mt-5">Showing <span class='text-primary'>employees'</span> details</h2>
        <div class="mt-3">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <!-- <th>Date of Birth</th> -->
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT id, profile_url, name, email, gender, mobile, date_of_birth from users where role = 'employee' and deleted_at is null order by id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td class="w-25">
                                <img src="<?php echo $row["profile_url"] ? "../Images/" . $row["profile_url"] : "../Images/defaultImg.webp" ?>" alt="No profile to show" class="d-inline-block w-50 img-thumbnail object-fit-contain border rounded-circle ">
                            </td>
                            <td class='w-25'><?php echo $row["name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["gender"] ?></td>
                            <td><?php echo $row["mobile"] ?></td>
                            <td>
                                <a href="viewEmployeeAllDetails.php?id=<?php echo $row["id"] ?>" class="btn btn-info text-white btn-sm">View</a>
                            </td>
                            <!-- <td class='w-25'><?php echo $row["date_of_birth"] ?></td> -->
                            <td>
                                <!-- <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="get">
                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                    <input type="submit" name='update' class="btn btn-primary btn-sm" value='Update' />
                                </form> -->
                                <a href="updateEmployee.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm">Update</a>
                            </td>
                            <td>
                                <a href="trackEmployee.php?id=<?php echo $row["id"] ?>" class="btn btn-warning text-muted btn-sm">Track</a>
                            </td>
                            <td>
                                <a href="workingHourEmployeeDetails.php?id=<?php echo $row["id"] ?>" class="btn btn-success btn-sm">Working</a>
                            </td>
                            <td class='w-25'>
                                <a href="addEmployeeInfo.php?id=<?php echo $row["id"] ?>" class="btn btn-dark btn-sm">Add/Edit Info</a>
                            </td>
                            <td>
                                <a href="deleteEmployee.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <footer class="d-flex flex-wrap justify-content-between align-items-center m-3 p-3 border-top">
        <p class="mb-0 text-body-secondary">Copyright &copy; 2023 - <?php echo date("Y") ?>, All Rights Reserved</p>

        <a href="home.php" class="col-1 svg">
            <img src="../Images/mainIcon.gif" alt='svg here'>
        </a>

        <p class=" mb-0 text-body-secondary">Handcrafted & Made with ❤️ - <a href="https://soham-bharti.netlify.app/" target="_blank" class='fw-bold text-decoration-none cursor-pointer text-danger'>Soham Bharti</a></p>

    </footer>


</body>

</html>