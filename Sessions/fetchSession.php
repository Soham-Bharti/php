<?php

// Get PHP Session Variable Values
// Next, we create another page called "demo_session2.php". From this page, we will access the session information we set on the first page ("demo_session1.php").

// Notice that session variables are not passed individually to each new page, instead they are retrieved from the session we open at the beginning of each page (session_start()).

session_start();
?>

<html>

<body>
    <?php
    // Fetching seesion variables

    print_r($_SESSION); // Array ( [mode] => dark [favColor] => red )
    echo "<br>";

    echo "User's favorite mode is " . $_SESSION['mode'] . " mode. <br>"; // User's favorite mode is dark mode.
    echo "User's favorite color is " . $_SESSION['favColor'] . " color. <br>"; // User's favorite color is red color.

    ?>


</body>

</html>