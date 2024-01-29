<?php


// array_replace_recursive()
// The array_replace_recursive() function replaces the values of the first array with the values from following arrays recursively.

// Tip: You can assign one array to the function, or as many as you like.

// If a key from array1 exists in array2, values from array1 will be replaced by the values from array2. If the key only exists in array1, it will be left as it is. If a key exist in array2 and not in array1, it will be created in array1. If multiple arrays are used, values from later arrays will overwrite the previous ones.

// Note: If you do not specify a key for each array, this function will behave exactly the same as the array_replace() function.

// Syntax
// array_replace_recursive(array1, array2, array3, ...)



$a1 = array("a" => array("red"), "b" => array("green", "blue"),);
$a2 = array("a" => array("yellow"), "b" => array("black"));
print_r(array_replace_recursive($a1, $a2)); // Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black [1] => blue ) )

echo "<br>";

print_r(array_replace($a1, $a2)); // Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black ) )

echo "<br>";

$a1 = array("a" => array("red"), "b" => array("green", "blue"));
$a2 = array("a" => array("yellow"), "b" => array("black"));
$a3 = array("a" => array("orange"), "b" => array("burgundy"));
print_r(array_replace_recursive($a1, $a2, $a3)); // Array ( [a] => Array ( [0] => orange ) [b] => Array ( [0] => burgundy [1] => blue ) )

echo "<br>";

$a1 = array("a" => array("red"), "b" => array("green", "blue"),);
$a2 = array("a" => array("yellow"), "b" => array("black"));

$result = array_replace_recursive($a1, $a2);
print_r($result); // Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black [1] => blue ) )


echo "<br>";


$result = array_replace($a1, $a2);
print_r($result); // Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black ) )
