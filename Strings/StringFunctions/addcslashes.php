<?php

// PHP addcslashes() Function
//	Returns a string with backslashes in front of the specified characters
// Note: The addcslashes() function is case-sensitive.

$str = addcslashes("Hello, world!", "w");
echo $str . "<br>"; // Hello, \world!

$str = addcslashes("Hello, world!", "W");
echo $str . "<br>"; // Hello, world!


$str = addcslashes("Hello, world!", "w ");
echo $str . "<br>"; // Hello,\ \world!

$str = addcslashes("Hello, world!", "wde");
echo $str . "<br>"; // H\ello, \worl\d!


// Note: Be careful using addcslashes() on 0 (NULL), r (carriage return), n (newline), f (form feed), t (tab) and v (vertical tab). In PHP, \0, \r, \n, \t, \f and \v are predefined escape sequences.

$para = addcslashes("Hello there!, My name is Soham. \n about me", "n");
echo $para . "<br>"; // Hello there!, My \name is Soham. about me


$para = addcslashes("Hello there!, My name is Soham. \n about me", "\n");
echo $para . "<br>"; // Hello there!, My name is Soham. \n about me


$para = addcslashes("Hello there!, My name is Soham. \0 is not discovered my me", "0");
echo $para . "<br>"; // Hello there!, My name is Soham. is not discovered my me


$para = addcslashes("Hello there!, My name is Soham. \0 is not discovered my me", "\0");
echo $para . "<br>"; // Hello there!, My name is Soham. \000 is not discovered my me



// Add backslashes to a range of characters in a string:
$str = "Welcome to my humble Homepage!";
echo addcslashes($str, 'A..Z') . "<br>";
echo addcslashes($str, 'a..z') . "<br>";
echo addcslashes($str, "a..g") . "<br>";
