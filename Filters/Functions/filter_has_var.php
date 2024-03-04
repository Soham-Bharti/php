<?php

// filter_has_var()
// The filter_has_var() function checks whether a variable of a specified input type exist.

// This function checks the content received by the PHP page, so the variable must be sent to the page via e.g a querystring.

// Syntax
// filter_has_var(type, variable)

if (filter_has_var(INPUT_GET, "userName")) {
    echo "User Name found in your PHP Form<br>";
} else echo "User Name not found in your PHP Form<br>";
// before making hmtl form
// User Name not found in your PHP Form


// after making html form
// User Name found in your PHP Form
?>

<html>

<body>
    <form action="filter_has_var.php" method="get">
        <input type="text" name="userName" placeholder="Enter your name">
        <input type="submit" name="submit">
    </form>
    <?php
    if (filter_has_var(INPUT_GET, "userName")) {
        echo "User Name found in your PHP Form<br>";
    } else echo "User Name not found in your PHP Form<br>";
    // before making hmtl form
    // User Name not found in your PHP Form


    // after making html form
    // User Name found in your PHP Form
    ?>
</body>

</html>