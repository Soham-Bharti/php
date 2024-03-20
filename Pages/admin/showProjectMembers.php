<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
}

if (isset($_GET['id'])) $desiredProjectId = $_GET['id'];
// echo $desiredUserId;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$flag = true;
if (isset($_POST['delete'])) {
    // print_r($_POST);
    $desiredProjectId = test_input($_POST['projectId']);
    $memberId = $_POST['memberId'];

    if (empty($memberId) || $memberId == '') {
        $selectMemberErr = 'Required';
        $flag = false;
    }


    if ($flag) {
        // sending data to data base
        $sql = "INSERT INTO employeesProjects(project_id, user_id) values('$desiredProjectId', '$memberId');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<br>Record inserted successfully<br>";
            // if everthing if well then redirecting the admin
            // $_SESSION['addProjectMemberStatus'] = 'success';
            // header("Location: viewAllProjects.php");
        } else {
            echo "<br>Error occurred while inserting into table : " . mysqli_error($conn); // Print any errors returned by MySQL
        }
        mysqli_close($conn); // Close the database connection

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Memeber/s in the Project</title>
    <link rel="stylesheet" href="../../Styles/showProjectMembers.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class='d-flex flex-column min-vh-100'>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="../common/home.php" class="svg text-decoration-none text-success d-flex align-items-center">
                <img src="../../Images/mainIcon.gif" alt='svg here'>
                <span class='fw-bold text-success'>EmployeeTracker.com</span>
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="viewAllProjects.php">Back</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- nav ends -->

    <?php
    $sql = "SELECT title, description from projects where id = '$desiredProjectId' and deleted_at is null";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $description = $row['description'];
            if ($description == '') {
                $description = 'N/A';
            }
        }
    }
    ?>

    <h2 class="text-center mt-2"><span class='text-info'>All</span> Member/s in <span text-danger><?php echo $title ?></span> Project</h2>
    <div class="container mt-5 px-5 w-100">
        <table>
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Added on</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT u.id as id, u.name as name, ep.created_at as addedOn
                from users u
                inner join employeesProjects ep
                on u.id = ep.user_id
                where u.role = 'employee' and ep.project_id = '$desiredProjectId' and ep.deleted_at is null 
                order by u.id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $dateTime = $row["addedOn"];
                    $time = strtotime($dateTime);
            ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo date('d M Y', $time); ?></td>
                    </tr>
                <?php
                }
            } else { ?><span class='fw-bold text-center d-block h3 text-danger'><?php echo "No members are assigned yet!"; ?></span><?php
                                                                                                                                    } ?>
        </table>

    </div>

    <!-- footer here -->
    <?php include('../views/footer.php'); ?>
    <!-- footer ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script>
        new DataTable('#allMembersInProjectTable');
    </script>
</body>

</html>