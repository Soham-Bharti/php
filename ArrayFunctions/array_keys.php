<?php

// array_keys()
// The array_keys() function returns an array containing the keys.

// Syntax
// array_keys(array, value, strict)

$a = array("Volvo" => "XC90", "BMW" => "X5", "Toyota" => "Highlander");
print_r(array_keys($a)); // Array ( [0] => Volvo [1] => BMW [2] => Toyota )

echo "<br>";

$arr = array('235' => 'ok', '908' => 'ok', '345' => 'not ok',);
print_r(array_keys($arr, 'ok')); // Array ( [0] => 235 [1] => 908 )

echo "<br>";

$a = array(10, 20, 30, "10");
print_r(array_keys($a, "10", false)); // Array ( [0] => 0 [1] => 3 )

echo "<br>";

$a = array(10, 20, 30, "10");
print_r(array_keys($a, "10", true)); // Array ( [0] => 3 )
