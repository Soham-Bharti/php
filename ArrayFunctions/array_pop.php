<?php


// array_pop()
// The array_pop() function deletes the last element of an array.

// Syntax
// array_pop(array)

$a = array("red", "green", "blue");
array_pop($a);
print_r($a); // Array ( [0] => red [1] => green )

echo "<br>";


$arr = array('a' => 'soham', 'b' => 'mohit', 'c' => 'vivek');
echo array_pop($arr) . "<br>"; // vivek
print_r($arr); // Array ( [a] => soham [b] => mohit )
