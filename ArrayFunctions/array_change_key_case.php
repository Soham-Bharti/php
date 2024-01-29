<?php

// array_change_key_case()
// The array_change_key_case() function changes all keys in an array to lowercase or uppercase.

// Syntax
// array_change_key_case(array, case) -> case = CASE_UPPER, CASE_LOWER

$places = array('bihar' => 'patna', 'gujrat' => 'ahemdabad', 'up' => 'lucknow', 'mp' => 'bhopal');

$newPlaces = array_change_key_case($places, CASE_UPPER);
print_r($newPlaces); // Array ( [BIHAR] => patna [GUJRAT] => ahemdabad [UP] => lucknow [MP] => bhopal )

echo "<br>";

$newPlaces = array_change_key_case($places, CASE_LOWER);
print_r($newPlaces); // Array ( [bihar] => patna [gujrat] => ahemdabad [up] => lucknow [mp] => bhopal )

echo "<br>";


// If two or more keys will be equal after running array_change_key_case() (e.g. "b" and "B"), the latest array will override the other:
$pets = array("a" => "Cat", "B" => "Dog", "c" => "Horse", "b" => "Bird");
print_r(array_change_key_case($pets, CASE_UPPER)); // Array ( [A] => Cat [B] => Bird [C] => Horse )