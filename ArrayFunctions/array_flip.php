<?php

// PHP array_flip() Function
// The array_flip() function flips/exchanges all keys with their associated values in an array.

// Syntax
// array_flip(array)

$a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
$result = array_flip($a1);
print_r($result); // Array ( [red] => a [green] => b [blue] => c [yellow] => d )

echo "<br>";

$arr = [1, 2, 3];
print_r(array_flip($arr)); // Array ( [1] => 0 [2] => 1 [3] => 2 )
