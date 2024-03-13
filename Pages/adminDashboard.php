<?php
session_start();
require '../config/dbConnect.php';
// print_r($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="adminDashboard.css">
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
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <div class='fs-4'>
                <?php
                $user = $_SESSION['username'];
                echo "Admin Name: " . ucwords($user);
                ?>
            </div>
            <div class="buttons d-flex justify-content-between align-items-center">
                <form action="addEmployee.php" method="POST">
                    <input type="submit" name="add-submit" class="btn btn-success btn-lg" value="Add Employee">
                </form>
            </div>
        </div>
        <h2 class="text-center mt-5">Showing <span class='text-primary'>employees'</span> details</h2>
        <div class="mt-3 ">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Date of Birth</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql = "SELECT id, name, email, gender, mobile, date_of_birth from users where role = 'employee' order by id";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["gender"] ?></td>
                            <td><?php echo $row["mobile"] ?></td>
                            <td><?php echo $row["date_of_birth"] ?></td>
                            <td>
                                <form action="updateEmployee.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value='Update'/>
                                </form>
                            </td>
                            <td>
                                <form action="deleteEmployee.php" method="get">
                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                    <input type="submit" class="btn btn-danger btn-sm" value='Delete'/>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>
</body>

</html>