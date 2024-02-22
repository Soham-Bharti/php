<?php

// array_replace()
// The array_replace() function replaces the values of the first array with the values from following arrays.

// Tip: You can assign one array to the function, or as many as you like.

// If a key from array1 exists in array2, values from array1 will be replaced by the values from array2. If the key only exists in array1, it will be left as it is (See Example 1 below).

// If a key exist in array2 and not in array1, it will be created in array1 (See Example 2 below).

// If multiple arrays are used, values from later arrays will overwrite the previous ones (See Example 3 below).

// Tip: Use array_replace_recursive() to replace the values of array1 with the values from following arrays recursively.



// Syntax
// array_replace(array1, array2, array3, ...)

$a1 = array("a" => "red", "b" => "green");
$a2 = array("a" => "orange", "burgundy");
print_r(array_replace($a1, $a2)); // Array ( [a] => orange [b] => green [0] => burgundy )

echo "<br>";

$a1 = array("a" => "red", "green");
$a2 = array("a" => "orange", "b" => "burgundy");
print_r(array_replace($a1, $a2)); // Array ( [a] => orange [0] => green [b] => burgundy )

echo "<br>";

$a1 = array("red", "green");
$a2 = array("blue", "yellow");
$a3 = array("orange", "burgundy");
print_r(array_replace($a1, $a2, $a3)); // Array ( [0] => orange [1] => burgundy )

echo "<br>";


$a1 = array("red", "green", "blue", "yellow");
$a2 = array(0 => "orange", 3 => "burgundy");
print_r(array_replace($a1, $a2)); // Array ( [0] => orange [1] => green [2] => blue [3] => burgundy )
