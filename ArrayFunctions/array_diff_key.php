<?php


// array_diff_key()
// The array_diff_key() function ***** compares the keys of two (or more) arrays ****, and returns the differences.

// This function compares the keys of two (or more) arrays, and return an array that contains the entries from array1 that are not present in array2 or array3, etc.

// Syntax
// array_diff_key(array1, array2, array3, ...)
$a1 = array("red", "green", "blue", "yellow");
$a2 = array("red", "green", "blue");

$result = array_diff_key($a1, $a2);
print_r($result); // Array ( [3] => yellow )

echo "<br>";

$a1=array("a"=>"red","b"=>"green","c"=>"blue");
$a2=array("c"=>"yellow","d"=>"black","e"=>"brown");
$a3=array("f"=>"green","c"=>"purple","g"=>"red");

$result=array_diff_key($a1,$a2,$a3);
print_r($result); // Array ( [a] => red [b] => green )
