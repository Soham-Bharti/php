<?php


// array_intersect_key()
// The array_intersect_key() function compares the keys of two (or more) arrays, and returns the matches.

// This function compares the keys of two or more arrays, and return an array that contains the entries from array1 that are present in array2, array3, etc.

// Syntax
// array_intersect_key(array1, array2, array3, ...)

$a1 = array("a" => "red", "b" => "green", "c" => "blue");
$a2 = array("a" => "red", "c" => "blue", "d" => "pink");

$result = array_intersect_key($a1, $a2);
print_r($result); // Array ( [a] => red [c] => blue )

echo "<br>";

$a1 = array("red", "green", "blue", "yellow");
$a2 = array("red", "green", "blue");

$result = array_intersect_key($a1, $a2);
print_r($result); // Array ( [0] => red [1] => green [2] => blue )
