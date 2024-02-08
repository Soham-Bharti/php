<?php
session_start();
?>


<html>
<body>
    <?php
    // Modifying session variables
    echo "User's (old) current mode is " . $_SESSION['mode'] . " mode. <br>"; // User's (old) current mode is dark mode.

    $_SESSION['mode'] = 'light';

    echo "User's (new) current mode is " . $_SESSION['mode'] . " mode. <br>"; // User's (new) current mode is light mode.


    ?>
</body>
</html>