<?php

// array_rand()
// The array_rand() function returns a random key from an array, or it returns an array of random keys if you specify that the function should return more than one key.

$arr = array('soham', 8, 9.8, true, 4, 6, 7, 23, 3, 242, 4234, 234, 324, 324, 4, 324, 234, 32, 4);
$randomKeys = array_rand($arr);
print_r($randomKeys); // 8, 10, etc. (only one value by default)

echo "<br>";

$randomKeys = array_rand($arr, 2);
print_r($randomKeys); // Array ( [0] => 9 [1] => 14 ),  Array ( [0] => 0 [1] => 4 )....
echo "<br>";
echo $arr[$randomKeys[0]]; // 8, soham, 4234, 6, ...


echo "<br>";

$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r(array_rand($a,2)); // Array ( [0] => b [1] => d ), ....