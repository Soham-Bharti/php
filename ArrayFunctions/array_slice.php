<?php

// array_slice()
// The array_slice() function returns selected parts of an array.

// Note: If the array have string keys, the returned array will always preserve the keys 


// Syntax
// array_slice(array, start, length, preserve)


$a = array("red", "green", "blue", "yellow", "brown");
print_r(array_slice($a, 2)); // Array ( [0] => blue [1] => yellow [2] => brown )

echo "<br>";

print_r(array_slice($a, 1, 1)); // Array ( [0] => green )
echo "<br>";

print_r(array_slice($a, 1)); // Array ( [0] => green [1] => blue [2] => yellow [3] => brown )
echo "<br>";

$a = array("red", "green", "blue", "yellow", "brown");
print_r(array_slice($a, -2, 1)); // Array ( [0] => yellow )
echo "<br>";


// preserve	Optional. Specifies if the function should preserve or reset the keys. Possible values:
//     true - Preserve keys
//     false - Default. Reset keys


print_r(array_slice($a, -2, 1, true)); //Array ( [3] => yellow )


echo "<br>";

// Note: If the array have string keys, the returned array will always preserve the keys 
$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow","e"=>"brown");
print_r(array_slice($a,1,2)); // Array ( [b] => green [c] => blue )

echo "<br>";


$a=array("0"=>"red","1"=>"green","2"=>"blue","3"=>"yellow","4"=>"brown");
print_r(array_slice($a,1,2)); // Array ( [0] => green [1] => blue )