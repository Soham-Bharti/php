<?php

// PHP Include Files
// The include (or require) statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement.

// Including files is very useful when you want to include the same PHP, HTML, or text on multiple pages of a website.

// The include and require statements are identical, except upon failure:

// require will produce a fatal error (E_COMPILE_ERROR) and stop the script
// include will only produce a warning (E_WARNING) and the script will continue


include 'vars.php';
// include 'vars1.php';
// require 'vars1.php';


echo "My name is $name and my id is $number <br>"; // My name is Soham and my id is 7

function printName()
{
    global $name;
    echo "Name is $name";
}
printName();
