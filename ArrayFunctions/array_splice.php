<?php


// array_splice()
// The array_splice() function removes selected elements from an array and replaces it with new elements. The function also returns an array with the removed elements.

// Tip: If the function does not remove any elements (length=0), the replaced array will be inserted from the position of the start parameter (See Example 2).

// Note: The keys in the replaced array are not preserved.

// Syntax
// array_splice(array, start, length, array)

$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"purple","b"=>"orange");
print_r(array_splice($a1,0,2,$a2)); // Array ( [a] => red [b] => green )
echo "<br>";
print_r($a1); // Array ( [0] => purple [1] => orange [c] => blue [d] => yellow )
echo "<br>";

$a1=array("0"=>"red","1"=>"green");
$a2=array("0"=>"purple","1"=>"orange");
array_splice($a1,1,0,$a2);
print_r($a1); // Array ( [0] => red [1] => purple [2] => orange [3] => green )