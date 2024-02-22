<?php 
session_start();
print_r($_SESSION);
if(isset($_POST['login'])){
    // Check if session variables are set and match the input values
    if(!empty($_SESSION['userName']) && !empty($_SESSION['userPassword']) && $_POST['userName'] == $_SESSION['userName'] && $_POST['userPassword'] == $_SESSION['userPassword'] ){
        // If the user is authenticated, redirect to Bank.php
        echo "bygyii";
        header('Location: Bank.php');
        exit;
    } else {
        // If session expired or the user is new, show a message
        echo "Either Session expired or You are new here, kindly register!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBI 2.0</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        Name: <input type="text" name="userName">
        Password: <input type="text" name="userPassword">
        <input type="submit" value="login" name="login">
    </form>
</body>
</html>
