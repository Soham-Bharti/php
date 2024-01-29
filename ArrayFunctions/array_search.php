<?php

// array_search()
// The array_search() function search an array for a value and returns the key.

// Syntax
// array_search(value, array, strict)
// strict	Optional. If this parameter is set to TRUE, then this function will search for identical elements in the array. Possible values:
//     true
//     false - Default


$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_search("red", $a); // a

echo "<br>";


// strict -> true

$a = array("a" => "5", "b" => 5, "c" => "5");
echo array_search(5, $a, true); // b

echo "<br>";


echo array_search(3, [0, 1, 2, 3, 4]); // 3
