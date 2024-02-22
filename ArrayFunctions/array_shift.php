<?php

// array_shift()
// The array_shift() function removes the first element from an array, and returns the value of the removed element.

// Note: If the keys are numeric, all elements will get new keys, starting from 0 and increases by 1 (See example below).

// Syntax
// array_shift(array)


$arr = array(1, 2, 3);
echo array_shift($arr); // 1
echo "<br>";
print_r($arr); // Array ( [0] => 2 [1] => 3 )
echo "<br>";


$a = array("a" => "red", "b" => "green", "c" => "blue");
echo array_shift($a) . "<br>"; // red
print_r($a); // Array ( [b] => green [c] => blue )

echo "<br>";

$a = array(0 => "red", 1 => "green", 2 => "blue");
echo array_shift($a) . "<br>"; // red
print_r($a); // Array ( [0] => green [1] => blue )
