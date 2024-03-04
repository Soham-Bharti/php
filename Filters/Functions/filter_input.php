<?php

// filter_input()
// The filter_input() function gets an external variable (e.g. from form input) and optionally filters it.

// This function is used to validate variables from insecure sources, such as user input.

// Syntax
// filter_input(type, variable, filter, options)


?>
<html>

<body>
    <form action="filter_input.php" method="post">
        <input type="email" name="email" placeholder="Enter your name">
        <input type="submit" name="submit">
    </form>
    <?php
    if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
        echo ("Email is not valid");
    } else {
        echo ("Email is valid");
    }
    ?>
</body>

</html>