<?php


// array_reverse()
// The array_reverse() function returns an array in the reverse order.


// Syntax
// array_reverse(array, preserve)

$a = array("a" => "Volvo", "b" => "BMW", "c" => "Toyota");
print_r(array_reverse($a)); // Array ( [c] => Toyota [b] => BMW [a] => Volvo )

echo "<br>";

print_r(array_reverse([1, 2, 3, 4, 5])); // Array ( [0] => 5 [1] => 4 [2] => 3 [3] => 2 [4] => 1 )

echo "<br>";

print_r(array_reverse([1, 2, 3, 4, 5], true)); // Array ( [4] => 5 [3] => 4 [2] => 3 [1] => 2 [0] => 1 )

echo "<br>";

$a = array("Volvo", "XC90", array("BMW", "Toyota"));
$reverse = array_reverse($a);
$preserve = array_reverse($a, true); // preserve -> true


// preserve	Optional. Specifies if the function should preserve the keys of the array or not. Possible values:
//     true
//     false

print_r($a); // Array ( [0] => Volvo [1] => XC90 [2] => Array ( [0] => BMW [1] => Toyota ) )
echo "<br>";
print_r($reverse); // Array ( [0] => Array ( [0] => BMW [1] => Toyota ) [1] => XC90 [2] => Volvo )
echo "<br>";
print_r($preserve); // Array ( [2] => Array ( [0] => BMW [1] => Toyota ) [1] => XC90 [0] => Volvo )
