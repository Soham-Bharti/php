<!-- Note: The session_start() function must be the very first thing in your document. Before any HTML tags. -->
<?php


// PHP Sessions
// A session is a way to store information (in variables) to be used across multiple pages.
// Unlike a cookie, the information is not stored on the users computer.



// Start a PHP Session
// A session is started with the session_start() function.

// Session variables are set with the PHP global variable: $_SESSION.

// Starting a session
session_start();
?>
<html>

<body>

    <?php
    // Setting session variables    
    $_SESSION['mode'] = 'dark';
    $_SESSION['favColor'] = 'red';
    echo "Sessions has been set";

    ?>

</body>

</html>