<?php


// array_merge()
// The array_merge() function merges one or more arrays into one array.

// Tip: You can assign one array to the function, or as many as you like.

// Note: If two or more array elements have the same key, the last one overrides the others.

// Note: If you assign only one array to the array_merge() function, and the keys are integers, the function returns a new array with integer keys starting at 0 and increases by 1 for each value (See example below).

// Tip: The difference between this function and the array_merge_recursive() function is when two or more array elements have the same key. Instead of override the keys, the array_merge_recursive() function makes the value as an array.


// Syntax
// array_merge(array1, array2, array3, ...)

$arr = array('red', 'green', 'blue', 'yellow');
$brr = ['choco', 'lavender'];

print_r(array_merge($arr, $brr)); // Array ( [0] => red [1] => green [2] => blue [3] => yellow [4] => choco [5] => lavender )


echo "<br>";

$arr = array(1, 2);
$brr = array(3, 4);
print_r(array_merge($arr, $brr)); // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )

echo "<br>";

$arr = array(001 => 'soham', 1000 => 'sonu', 829 => 'monu');
$brr = array(278 => 'piyush', 829 => 'mahakal');
print_r(array_merge($arr, $brr)); // Array ( [0] => soham [1] => sonu [2] => monu [3] => piyush [4] => mahakal )

echo "<br>";

$arr = array('001' => 'soham', '1000' => 'sonu', "829" => 'monu');
$brr = array("278" => 'piyush', "829" => 'mahakal');
print_r(array_merge($arr, $brr)); // Array ( [001] => soham [0] => sonu [1] => monu [2] => piyush [3] => mahakal )

echo "<br>";


$arr = array('a' => 'soham', 'b' => 'sonu');
$brr = array('c' => 'sonu', 'b' => 'amaresh');
print_r(array_merge($arr, $brr)); // Array ( [a] => soham [b] => amaresh [c] => sonu )

echo "<br>";

