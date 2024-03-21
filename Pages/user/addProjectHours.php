<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role'] !== 'emp') {
    header('Location: ../common/login.php');
}

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];

$description = "";
$projectTitleErr = $descErr = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$flag = true;

if (isset($_POST['submit'])) {
    print_r($_POST);
    $projectId = test_input($_POST['projectId']);
    $description = test_input($_POST['description']);
    $desiredUserId = test_input($_POST['desiredUserId']);

    if (empty($description)) {
        $descErr = "Requied";
        $hoursflag = false;
    } else {
        // if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $description)) {
        //     $descErr = "* Only letters, white space and numbers allowed";
        //     $flag = false;
        // }
    }

    if ($flag) {
        $sql = "INSERT INTO UserProjectDailyTask(user_id, project_id, activity_log) values('$desiredUserId', '$projectId', '$description');";
        if (mysqli_query($conn, $sql)) {
            // echo "<br>New record inserted successfully<br>";
            $_SESSION['AddDailyTaskStatus'] = 'success';
            header("Location: pms.php");
        } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        mysqli_close($conn);
    } else echo "Something went wrong while data insertion!";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Daily Task</title>
    <link rel="stylesheet" href="../../Styles/addProjectHours.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script> -->
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
                    <a class="nav-link" href="pms.php">Back</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </nav>
    <!-- nav ends -->
    <h2 class="text-center mt-3">Add <span class='text-info'>Daily</span> Task</h2>
    <div class="container mt-3">
        <div class="col-md-7">
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
                <div class="mb-3">
                    <label class="col-form-label">Assigned Projects <span class='text-danger'>* <?php echo $projectTitleErr ?></span></label>
                    <!-- selectpicker -->
                    <select class="form-control" name="projectId" id='projectId' data-live-search="true"> 
                        <?php
                        $sql = "SELECT p.id as projectID, p.title as projectTITLE
                            from projects p
                            inner join employeesprojects ep
                            on p.id = ep.project_id
                            where ep.user_id = '$desiredUserId'";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $projectID = $row['projectID'];
                                $projectTITLE = $row['projectTITLE'];

                        ?> <option value="<?php echo $projectID ?>"><?php echo $projectTITLE ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="" disabled selected>No Projects found!</option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description <span class='text-danger'>* <?php echo $descErr ?></span></label>
                    <input type="text" class="form-control" name="description" placeholder="Fixed ***** bug...">
                </div>
                <input type="hidden" class="form-control" name="desiredUserId" value="<?php echo $desiredUserId; ?>">
                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>
        </div>
    </div>

    <!-- footer here -->
    <?php include('../views/footer.php'); ?>
    <!-- footer ends -->

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
</body>

</html>