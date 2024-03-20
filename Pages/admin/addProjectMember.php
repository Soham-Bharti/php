<?php
session_start();
require '../../config/dbConnect.php';
// print_r($_SESSION);
if ($_SESSION['role'] !== 'admin') {
    header('Location: ../common/login.php');
    exit();
}


$selectMemberErr = $num = $Err = "";
$desiredProjectId = "";

if (isset($_GET['id'])) $desiredProjectId = $_GET['id'];
if (isset($_GET['num'])) {
    $permanentNum = $_GET['num'];
    $num = $permanentNum;
}
if (isset($_GET['selectMemberErr'])) $selectMemberErr = $_GET['selectMemberErr'];
// echo $desiredUserId;

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$flag = true;
if (isset($_POST['add'])) {
    // print_r($_POST);
    $desiredProjectId = test_input($_POST['projectId']);

    $memberIdArr = $_POST['memberId'];
    $temp_array = array_unique($memberIdArr);
    $duplicates = sizeof($temp_array) != sizeof($memberIdArr); // returns true if duplicate found
    $memberIdArraySize = sizeof($memberIdArr);
    if ($duplicates) {
        $flag = false;
        $Err = "Duplicates found!";
    } else {
        // if(sizeof($memberIdArr) != $num) {
        //     $flag = false;
        //     $Err = "---";
        // }
        if ($flag) {
            // sending data to data base
            foreach ($memberIdArr as $value) {
                $sql = "INSERT INTO employeesProjects(project_id, user_id) values('$desiredProjectId', '$value');";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<br>Record inserted successfully<br>";
                    // if everthing if well then redirecting the admin
                    $_SESSION['addProjectMemberStatus'] = 'success';
                    header("Location: viewAllProjects.php");
                } else {
                    echo "<br>Error occurred while inserting into table : " . mysqli_error($conn); // Print any errors returned by MySQL
                }
            }
            mysqli_close($conn); // Close the database connection
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Memeber</title>
    <link rel="stylesheet" href="../../Styles/updateemployee.css">
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
    <h2 class="text-center mt-2"><span class='text-info'>Add</span> Member in <span text-danger><?php echo $title ?></span> Project</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <div class="my-3 d-flex align-items-center justify-content-around gap-4">
                <div class='text-center'>
                    <p>Project ID: <span class="fw-bold text-secondary"><?php echo $desiredProjectId ?></span></p>
                    <p>Description: <span class="fw-bold text-secondary"><?php echo $description ?></span></p>
                    <p><span><?php echo $Err ?></p>
                </div>
            </div>
            <hr>
            <?php if ($num == '') { ?>
                <form action="projectMemberCount.php" method='post'>
                    <div class="mb-3">
                        <label class="col-form-label">Select Number of Members to add <span>* <?php echo $selectMemberErr ?></label>
                        <select class="form-select" name="numberOfMembers">
                            <option value="1" <?php echo $num == 1 ? "selected" : '' ?>>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="" selected disabled>--</option>
                        </select>
                    </div>
                    <input type="hidden" name="projectId" class="btn btn-dark" value="<?php echo $desiredProjectId ?>">
                    <div class="mb-3">
                        <input type="submit" name="submit" class="btn btn-dark" value="Go">
                    </div>
                </form>
            <?php } ?>
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
                <?php while ($num-- > 0) { ?>
                    <div class="mb-3">
                        <label class="col-form-label">Select Member <span>* <?php echo $selectMemberErr ?></label>
                        <select class="form-select" name="memberId[]">
                            <?php
                            $sql2 = "SELECT id, name
                            FROM users 
                            WHERE role = 'employee'
                            AND deleted_at IS NULL
                            AND NOT EXISTS (
                                SELECT 1
                                FROM employeesProjects
                                WHERE users.id = employeesProjects.user_id
                                AND employeesProjects.project_id = '$desiredProjectId'
                            )
                            ORDER BY name;";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row = mysqli_fetch_assoc($result2)) {
                            ?>
                                    <option name="memberId[]" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                                }
                            } else echo "No users available.";
                            ?>
                            <option value="" selected disabled>Employee</option>
                        </select>
                    </div>
                <?php } ?>
                <input type="hidden" name="projectId" value="<?php echo $desiredProjectId ?>">
                <?php if (isset($_GET['num']) && $_GET['num'] > 0 ) { ?>
                <div class="buttons">
                    <input type="submit" name="add" class="btn btn-dark btn-lg" value="Add">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>
                <?php } ?>


            </form>
        </div>
    </div>

    <!-- footer here -->
    <?php include('../views/footer.php'); ?>
    <!-- footer ends -->

</body>

</html>