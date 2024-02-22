<?php

// filter_input_array()
// The filter_input_array() function gets external variables (e.g. from form input) and optionally filters them.

// This function is useful for retrieving/filtering many values instead of calling filter_input() many times.

// Syntax
// filter_input_array(type, definition, add_empty)


$filters = array(
    "name" => array(
        "filter" => FILTER_CALLBACK, "flags" => FILTER_FORCE_ARRAY,
        "options" => "ucwords"
    ),
    "salary" => array(
        "filter" => FILTER_VALIDATE_INT, "options" => array("min_range" => 10000, "max_range" => 1500000)
    ),
    "email" => FILTER_VALIDATE_EMAIL
);

?>
<html>

<body>
    <form action="filter_input_array.php" method="post">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="number" name="salary" placeholder="Enter your salary">
        <input type="submit" name="submit">
    </form>
    <?php
    print_r(filter_input_array(INPUT_POST, $filters));
    ?>
</body>

</html>