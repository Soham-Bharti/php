<?php

// array_diff()
// The array_diff() function compares the values of two (or more) arrays, and returns the differences.

// This function compares the values of two (or more) arrays, and return an array that contains the entries from array1 that are not present in array2 or array3, etc.

// Syntax
// array_diff(array1, array2, array3, ...)

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");

$result = array_diff($a1, $a2);
print_r($result); // Array ( [d] => yellow )

echo "<br>";


$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "black", "g" => "purple");
$a3 = array("a" => "red", "b" => "black", "h" => "yellow");

$result = array_diff($a1, $a2, $a3);
print_r($result); // Array ( [b] => green [c] => blue )
