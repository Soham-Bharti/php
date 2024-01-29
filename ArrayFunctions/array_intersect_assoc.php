<?php


// array_intersect_assoc()

// The array_intersect_assoc() function compares the keys and values of two (or more) arrays, and returns the matches.

// This function compares the keys and values of two or more arrays, and return an array that contains the entries from array1 that are present in array2, array3, etc.


// Syntax
// array_intersect_assoc(array1,array2,array3, ...)

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("a" => "red", "b" => "green", "c" => "blue");

$result = array_intersect_assoc($a1, $a2);
print_r($result); // Array ( [a] => red [b] => green [c] => blue )

echo "<br>";

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("a" => "red", "b" => "green", "g" => "blue");
$a3 = array("a" => "red", "b" => "green", "g" => "blue");

$result = array_intersect_assoc($a1, $a2, $a3);
print_r($result); // Array ( [a] => red [b] => green )
