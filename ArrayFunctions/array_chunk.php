<?php

// array_chunk()
// The array_chunk() function splits an array into chunks of new arrays.

// Syntax
// array_chunk(array, size, preserve_key)

$cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
// array will be divided into arrays of chunck size 2
print_r(array_chunk($cars, 2));
/*
Array (
[0] => Array ( [0] => Volvo [1] => BMW )
[1] => Array ( [0] => Toyota [1] => Honda ) 
[2] => Array ( [0] => Mercedes [1] => Opel )
)
*/

echo "<br>";

// Parameter	Description
// array	Required. Specifies the array to use
// size	Required. An integer that specifies the size of each chunk
// preserve_key	Optional. Possible values:
// true - Preserves the keys
// false - Default. Reindexes the chunk numerically
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43", "Harry" => "50");
print_r(array_chunk($age, 2, true)); // Array ( [0] => Array ( [Peter] => 35 [Ben] => 37 ) [1] => Array ( [Joe] => 43 [Harry] => 50 ) )

echo "<br>";

print_r(array_chunk($age, 2)); // Array ( [0] => Array ( [0] => 35 [1] => 37 ) [1] => Array ( [0] => 43 [1] => 50 ) )
