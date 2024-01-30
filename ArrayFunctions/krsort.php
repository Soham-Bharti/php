<?php


// krsort()
// The krsort() function sorts an associative array in descending order, according to the key.

// Tip: Use the ksort() function to sort an associative array in ascending order, according to the key.

// Tip: Use the arsort() function to sort an associative array in descending order, according to the value.



// Syntax
// krsort(array, sorttype)

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
krsort($age);
print_r($age); // Array ( [Peter] => 35 [Joe] => 43 [Ben] => 37 )

echo "<br>";

$arr = array(2, 4, 34, 23, 54, 5, 1);
krsort($arr);
print_r($arr); // Array ( [6] => 1 [5] => 5 [4] => 54 [3] => 23 [2] => 34 [1] => 4 [0] => 2 )