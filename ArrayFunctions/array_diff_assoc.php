<?php


// array_diff_assoc()
// The array_diff_assoc() function ***compares the keys and values of two (or more) arrays***, and returns the differences.

// This function compares the keys and values of two (or more) arrays, and return an array that contains the entries from array1 that are not present in array2 or array3, etc.

// Syntax
// array_diff_assoc(array1,array2,array3...)

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("a" => "red", "b" => "green", "c" => "blue");

$result = array_diff_assoc($a1, $a2);
print_r($result); // Array ( [d] => yellow )

echo "<br>";

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "green", "g" => "blue");

$result = array_diff_assoc($a1, $a2);
print_r($result); // Array ( [a] => red [b] => green [c] => blue [d] => yellow )

echo "<br>";

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("a" => "red", "f" => "green", "g" => "blue");
$a3 = array("h" => "red", "b" => "green", "g" => "blue");

$result = array_diff_assoc($a1, $a2, $a3);
print_r($result); // Array ( [c] => blue [d] => yellow )
