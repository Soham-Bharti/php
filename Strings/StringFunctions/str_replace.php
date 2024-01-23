<?php

// PHP str_replace() Function
// Replaces some characters in a string (case-sensitive)

// Syntax
// str_replace(find,replace,string,count)

$str = "Hello World";
echo str_replace("World", "Soham", $str) . "<br"; // Hello Soham

$arr = array('red', 'green', 'yellow', 'blue', 'coral', 'red');
print_r(str_replace('yellow', 'green', $arr)); // red [1] => green [2] => green [3] => blue [4] => coral )
echo "<br>";

print_r(str_replace('red', "soham's fav colour", $arr, $count));
echo "<br>";
echo 'Total replacements = ' . $count;

echo "<br>";
$find = array("Hello","world");
$replace = array("B");
$arr = array("Hello","world","!");
print_r(str_replace($find,$replace,$arr));