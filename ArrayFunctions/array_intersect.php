<?php


// array_intersect()
// The array_intersect() function compares the values of two (or more) arrays, and returns the matches.

// This function compares the values of two or more arrays, and return an array that contains the entries from array1 that are present in array2, array3, etc.


// Syntax
// array_intersect(array1, array2, array3, ...)

$arr = [2, 9, 'pinto', true, 4, 1, 3];
$brr = ['soham', 2, 1];

print_r(array_intersect($arr, $brr)); // Array ( [0] => 2 [3] => 1 [5] => 1 )

echo "<br>";

$arr = [2, 9, 'pinto', true, 4, 1, false,  3];
$brr = ['soham', 0, 1];
print_r(array_intersect($arr, $brr)); // Array ( [3] => 1 [5] => 1 )

echo "<br>";

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "black", "g" => "purple");
$a3 = array("a" => "red", "b" => "black", "h" => "yellow");

$result = array_intersect($a1, $a2, $a3);
print_r($result); // Array ( [a] => red )
echo "<br>";



$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$a2 = array("e" => "red", "f" => "black", "g" => "green");
$a3 = array("a" => "red", "b" => "black", "h" => "yellow", ' '=>"green");

$result = array_intersect($a1, $a2, $a3);
print_r($result); // Array ( [a] => red [b] => green )

