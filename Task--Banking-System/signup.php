<?php
session_start();
print_r($_SESSION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBI 2.0</title>
</head>
<body>
    <form action="User.php" method="post">
        Name: <input type="text" name="name">
        Password: <input type="text" name="password">
        Mobile: <input type="number" name='mobile'>
        <input type="submit" value="signup" name="submit">
    </form>
</body>
</html>