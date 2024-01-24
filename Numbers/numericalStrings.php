<?php

// PHP Numerical Strings
// The PHP is_numeric() function can be used to find whether a variable is numeric. The function returns true if the variable is a number or a numeric string, false otherwise.

$num = "54E+5";
// echo $num . "<br>";
var_dump(is_numeric($num)); // true

$num = "545";
var_dump(is_numeric($num)); // true

// From PHP 7.0: The is_numeric() function will return FALSE for numeric strings in hexadecimal form (e.g. 0xf4c3b00c), as they are no longer considered as numeric strings.


$n = "90+";
var_dump(is_numeric($n)); // false
