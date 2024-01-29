<?php

// array_merge_recursive()
// The array_merge_recursive() function merges one or more arrays into one array.

// The difference between this function and the array_merge() function is when two or more array elements have the same key. Instead of override the keys, the array_merge_recursive() function makes the value as an array.

// Note: If you assign only one array to the array_merge_recursive() function, it will behave exactly the same as the array_merge() function.



// Syntax
// array_merge_recursive(array1, array2, array3, ...)


$a1 = array("a" => "red", "b" => "green");
$a2 = array("c" => "blue", "b" => "yellow");
print_r(array_merge_recursive($a1, $a2)); // Array ( [a] => red [b] => Array ( [0] => green [1] => yellow ) [c] => blue )

echo "<br>";

$arr = array('a' => 'red', 'b' => 'green', 'c' => 'blue');
$brr = array('b' => 'violet', 'e' => 'green');
print_r(array_merge_recursive($arr, $brr)); // Array ( [a] => red [b] => Array ( [0] => green [1] => violet ) [c] => blue [e] => green )

echo "<br>";

$arr = array('a' => 'red', 'b' => 'green', 'b' => 'yellow', 'c' => 'blue');
$brr = array('b' => 'violet', 'b' => 'pink', 'e' => 'green');
$crr = array('b' => 'sky blue',);
print_r(array_merge_recursive($arr, $brr, $crr)); // Array ( [a] => red [b] => Array ( [0] => yellow [1] => pink [2] => sky blue ) [c] => blue [e] => green )

echo "<br>";
