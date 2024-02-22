<?php

// ksort()
// The ksort() function sorts an associative array in ascending order, according to the key.

// Tip: Use the krsort() function to sort an associative array in descending order, according to the key.

// Tip: Use the asort() function to sort an associative array in ascending order, according to the value.

// Syntax
// ksort(array, sorttype)

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
ksort($age);
print_r($age); // Array ( [Ben] => 37 [Joe] => 43 [Peter] => 35 )

echo "<br>";

$arr = array(2, 4, 34, 23, 54, 5, 1);
ksort($arr);
print_r($arr); //Array ( [0] => 2 [1] => 4 [2] => 34 [3] => 23 [4] => 54 [5] => 5 [6] => 1 )
