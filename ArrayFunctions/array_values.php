<?php

// array_values()
// The array_values() function returns an array containing all the values of an array.

// Tip: The returned array will have numeric keys, starting at 0 and increase by 1.


// Syntax
// array_values(array)

$a = array("Name" => "Peter", "Age" => "41", "Country" => "USA");
print_r(array_values($a)); // Array ( [0] => Peter [1] => 41 [2] => USA )
echo "<br>";

$a = array("Name" => "Peter", "Age" => "41", "Age" => "6", "Country" => "USA");
print_r(array_values($a)); // Array ( [0] => Peter [1] => 6 [2] => USA )
echo "<br>";

$a = array("Name" => "Peter", "Age" => "41", "Ag" => "40", "Country" => "USA");
print_r(array_values($a)); // Array ( [0] => Peter [1] => 41 [2] => 40 [3] => USA )
echo "<br>";

