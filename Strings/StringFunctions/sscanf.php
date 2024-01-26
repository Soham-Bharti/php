<?php

// PHP sscanf() Function
// Parses input from a string according to a format

// Syntax
// sscanf(string,format,arg1,arg2,arg++)

$str = "age:30 weight:60kg";
sscanf($str, "age:%d weight:%dkg", $age, $weight);

// show types and values
var_dump($age, $weight);
echo '<br>';


$str = "If you divide 4 by 2 you'll get 2";
$format = sscanf($str, "%s %s %s %d %s %d %s %s %c");
print_r($format);
