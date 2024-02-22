<?php


// asort()
// The asort() function sorts an associative array in ascending order, according to the value.

// Tip: Use the arsort() function to sort an associative array in descending order, according to the value.

// Tip: Use the ksort() function to sort an associative array in ascending order, according to the key.



// Syntax
// asort(array, sorttype)

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
asort($age);
print_r($age); // Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )


echo "<br>";

$arr = array(2, 4, 34, 23, 54, 5, 1);
asort($arr); 
print_r($arr); // Array ( [6] => 1 [0] => 2 [1] => 4 [5] => 5 [3] => 23 [2] => 34 [4] => 54 )
