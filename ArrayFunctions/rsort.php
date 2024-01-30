<?php

// rsort()
// The rsort() function sorts an indexed array in descending order.

// Tip: Use the sort() function to sort an indexed array in ascending order.


// Syntax
// rsort(array, sorttype)

$cars = array("Volvo", "BMW", "Toyota");
rsort($cars);
print_r($cars); // Array ( [0] => Volvo [1] => Toyota [2] => BMW )

echo "<br>";

$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
print_r($numbers); // Array ( [0] => 22 [1] => 11 [2] => 6 [3] => 4 [4] => 2 )

echo "<br>";

$numbers = array('s' => 4, 'd' => 6, 'p' => 2, 'a' => 22, '' => 11);
rsort($numbers);
print_r($numbers); // Array ( [0] => 22 [1] => 11 [2] => 6 [3] => 4 [4] => 2 )

$numbers = array('s' => 4, 'd' => 6, 'p' => 2, 'a' => 22, '' => 11);
arsort($numbers);
echo "<br>";
print_r($numbers); // Array ( [a] => 22 [] => 11 [d] => 6 [s] => 4 [p] => 2 )

echo "<br>";

$cars = array("Volvo", "BMW", "Toyota"); // ASCII sum = 534, 230, 640 | First Char = 86, 66, 84 ???????
rsort($cars, SORT_NUMERIC);
print_r($cars); // Array ( [0] => Volvo [1] => BMW [2] => Toyota ) ?????

echo "<br>";

$cars = array("Volvo", "A", "a", "BMW", "Toyota");
rsort($cars, SORT_NUMERIC);
print_r($cars); // Array ( [0] => Volvo [1] => A [2] => a [3] => BMW [4] => Toyota )?????
