<?php
session_start();
require '../../config/dbConnect.php';
if ($_SESSION['role'] !== 'emp') {
    header('Location: ../common/login.php');
}

if (isset($_GET['id'])) $desiredUserId = $_GET['id'];

$description = "";
$Err = "";


$flag = true;

if (isset($_POST['submit'])) {
    // print_r($_POST);
    $projectId_Array = $_POST['projectId'];
    $description_Array = $_POST['description'];
    $desiredUserId = $_POST['desiredUserId'];

    $desiredArray = array_combine($projectId_Array, $description_Array);

    foreach ($description_Array as $value) {
        if (empty($value)) {
            $flag = false;
            $Err = "* An empty description was found *";
            break;
        }
    }

    if ($flag) {
        foreach ($desiredArray as $projectId => $description) {
            $sql = "INSERT INTO UserProjectDailyTask(user_id, project_id, activity_log) values('$desiredUserId', '$projectId', '$description');";
            if (mysqli_query($conn, $sql)) {
                // echo "<br>New record inserted successfully<br>";
                $_SESSION['AddDailyTaskStatus'] = 'success';
                header("Location: pms.php");
            } else echo "<br>Error occured while inserting into table : " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
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
            <div class='text-danger text-center fw-bold h4'><?php echo $Err ?></div>
            <form action="<?php echo htmlspecialchars($_SERVER['SCRIPT_NAME']); ?>" method="post">
                <div class="form-group fieldGroup d-flex justify-content-between align-items-center gap-5">
                    <div class="w-75">
                        <div class="mb-3">
                            <label class="col-form-label">Assigned Projects <span class='text-danger'>*</label>
                            <!-- selectpicker -->
                            <select class="form-control" name="projectId[]" id='projectId' data-live-search="true">
                                <?php
                                $sql = "SELECT p.id as projectID, p.title as projectTITLE
                            from projects p
                            inner join employeesprojects ep
                            on p.id = ep.project_id
                            where ep.user_id = '$desiredUserId' and p.deleted_at is null;";

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
                            <label class="form-label">Description <span class='text-danger'>*</label>
                            <input type="text" class="form-control" name="description[]" placeholder="Fixed ***** bug...">
                        </div>
                    </div>
                    <span>
                        <a href="javascript:void(0);" class="btn btn-success addMore w-100"><i class="custicon plus"></i> Add More</a>
                    </span>
                </div>

                <input type="hidden" class="form-control" name="desiredUserId" value="<?php echo $desiredUserId; ?>">
                <div class="buttons">
                    <input type="submit" name="submit" class="btn btn-dark btn-lg" value="Save">
                    <input type="reset" name="reset" class="btn btn-dark btn-lg">
                </div>

            </form>

            <!-- Replica of input field group HTML -->
            <div class="form-group fieldGroupCopy d-none">
                <div class="w-75">
                    <div class="mb-3">
                        <label class="col-form-label">Assigned Projects <span class='text-danger'>*</label>
                        <!-- selectpicker -->
                        <select class="form-control" name="projectId[]" id='projectId' data-live-search="true">
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
                        <label class="form-label">Description <span class='text-danger'>*</label>
                        <input type="text" class="form-control" name="description[]" placeholder="Fixed ***** bug...">
                    </div>
                </div>
                <span>
                    <a href="javascript:void(0)" class="btn btn-danger remove  w-100"><i class="custicon cross"></i> Remove</a>
                </span>
            </div>
        </div>
    </div>

    <!-- footer here -->
    <?php include('../views/footer.php'); ?>
    <!-- footer ends -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Maximum number of groups can be added
            var maxGroup = 10;

            // Add more group of input fields
            $(".addMore").click(function() {
                if ($('body').find('.fieldGroup').length < maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGroup d-flex justify-content-between align-items-center gap-5">' + $(".fieldGroupCopy").html() + '</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
            });

            // Remove fields group
            $("body").on("click", ".remove", function() {
                $(this).parents(".fieldGroup").remove();
            });
        });
    </script>
</body>

</html>