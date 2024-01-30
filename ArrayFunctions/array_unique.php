<?php

// array_unique()
// The array_unique() function removes duplicate values from an array. If two or more array values are the same, the first appearance will be kept and the other will be removed.

// Note: The returned array will keep the first array item's key type.



// Syntax
// array_unique(array, sorttype)

$a = array("a" => "red", "b" => "green", "c" => "red");
print_r(array_unique($a)); // Array ( [a] => red [b] => green )

echo "<br>";

$arr = array(2, 1, 3, 3, 21, 3, 3, 2, 4, 1, 2, 24, 1, 2, 3, 1, 3, 4, 2, 14, 4, 23, 1, 2, 3, 'soham', 2, 1, 3, 2, 11, 2, 3, 21, 12, 2);
// array_multisort($arr);
print_r(array_unique($arr)); // Array ( [0] => 2 [1] => 1 [2] => 3 [4] => 21 [8] => 4 [11] => 24 [19] => 14 [21] => 23 [29] => 11 [33] => 12 )
echo "<br>";
// print_r(array_count_values($arr)); // Array ( [2] => 10 [1] => 6 [3] => 9 [21] => 2 [4] => 3 [24] => 1 [14] => 1 [23] => 1 [soham] => 1 [11] => 1 [12] => 1 )
