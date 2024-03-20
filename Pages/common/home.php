<?php
session_start();
if (isset($_SESSION['adminLoggedIn'])) {
    $_SESSION['adminLoggedIn'] = false;
    $_SESSION['userLoggedIn'] = false;
}
unset($_SESSION['userName']);
unset($_SESSION['id']);
unset($_SESSION['role']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Styles/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class = 'd-flex flex-column min-vh-100'>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <a href="home.php" class="svg text-decoration-none d-flex align-items-center">
                <img src="../../Images/mainIcon.gif" alt='svg here'>
                <span class='text-success fw-bold'>EmployeeTracker.com</span>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <marquee direction="left" class='marquee display-5'>Welcome to Web Employee Tracker</marquee>

    <!-- footer here -->
    <?php include('../views/footer.php');?>
    <!-- footer ends -->

</body>

</html>