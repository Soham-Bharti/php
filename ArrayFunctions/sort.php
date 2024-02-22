<?php

// sort()
// The sort() function sorts an indexed array in ascending order.

// Tip: Use the rsort() function to sort an indexed array in descending order.


// Syntax
// sort(array, sorttype)

$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
print_r($cars); // Array ( [0] => BMW [1] => Toyota [2] => Volvo )


echo "<br>";

$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
print_r($numbers); // Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 11 [4] => 22 )
