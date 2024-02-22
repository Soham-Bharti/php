<?php

// arsort()
// The arsort() function sorts an associative array in descending order, according to the value.

// Tip: Use the asort() function to sort an associative array in ascending order, according to the value.

// Tip: Use the krsort() function to sort an associative array in descending order, according to the key.


// Syntax
// arsort(array, sorttype)


$arr = array(2, 4, 34, 23, 54, 5, 1);
arsort($arr); // 1
print_r($arr); // Array ( [4] => 54 [2] => 34 [3] => 23 [5] => 5 [1] => 4 [0] => 2 [6] => 1 )


echo "<br>";

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
arsort($age);
print_r($age); // Array ( [Joe] => 43 [Ben] => 37 [Peter] => 35 )
