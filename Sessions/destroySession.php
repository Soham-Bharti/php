<?php
session_start();
?>

<html>

<body>

    <?php
    // Destroy a PHP Session

    // To remove all global session variables and destroy the session, use session_unset() and session_destroy()


    // remove all session variables
    // session_unset() function: It deletes only the variables from session and session still exists. Only data is truncated.
    session_unset();
    echo "After remove all session variables <br>";
    print_r($_SESSION); // Array ( )


    // destroy the session
    // session_destroy() function: It destroys all of the data associated with the current session. It does not unset any of the global variables associated with the session, or unset the session cookie.
    echo "After destroy the session <br>";
    session_destroy();
    print_r($_SESSION); // Array ( )


    ?>

</body>

</html>