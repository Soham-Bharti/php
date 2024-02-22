<?php

// PHP stripslashes() Function
// The stripslashes() function removes backslashes added by the addslashes() function.

echo stripslashes("Hello from Soham\'s Robo...<br>"); // Hello from Soham's Robo...

$str = addslashes("Soham is busy with \\n robo");
echo $str . "<br>"; // Soham is busy with \\n robo
echo stripslashes($str); // Soham is busy with \n robo
