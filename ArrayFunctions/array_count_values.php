<?php

// The array_count_values() function counts all the values of an array.
// Syntax
// array_count_values(array) -> Returns an associative array, where the keys are the original array's values, and the values are the number of occurrences


$a = array("A", "Cat", "Dog", "A", "Dog");
print_r(array_count_values($a)); // Array ( [A] => 2 [Cat] => 1 [Dog] => 2 )

echo "<br>";

$b = array(1, 2, 3, 4, 5, 7, 2, 3, 5, 1, 3, 4, 2, 2, 4, 21, 4, 1, 4, 2, 3, 42, 3, 1, 3, 1, 2, 42, 1);
print_r(array_count_values($b)); // Array ( [1] => 6 [2] => 6 [3] => 6 [4] => 5 [5] => 2 [7] => 1 [21] => 1 [42] => 2 )
