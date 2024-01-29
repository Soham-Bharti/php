<?php

// array_map()
// The array_map() function sends each value of an array to a user-made function, and returns an array with new values, given by the user-made function.

// Tip: You can assign one array to the function, or as many as you like.



// Syntax
// array_map(myfunction, array1, array2, array3, ...)

function myfunction($v)
{
    return ($v * $v);
}

$a = array(1, 2, 3, 4, 5);
print_r(array_map("myfunction", $a)); // Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )

echo "<br>";

function fun($x)
{
    return ucwords($x);
}

$arr = array('soham bharti', 'amaresh sharma', 'ashok prajapati', 'komal dwivedi');
print_r(array_map("fun", $arr)); // Array ( [0] => Soham Bharti [1] => Amaresh Sharma [2] => Ashok Prajapati [3] => Komal Dwivedi )


echo "<br>";

function sum($x, $y, $z)
{
    return $x + $y + $z;
}
$ar = array(2, 4, 2, 7, 3);
$br = array(2, 4, 6, 7, 3);
$cr = array(2, 4, 6, 7, 3);
print_r(array_map('sum', $ar, $br, $cr)); // Array ( [0] => 6 [1] => 12 [2] => 18 [3] => 21 [4] => 9 )

echo "<br>";

$ar = array(2, 4,  7, 3);
$br = array(2, 4, 6, 7, 3);
$cr = array(2, 4, 6, 7, 3);
print_r(array_map('sum', $ar, $br, $cr)); // Array ( [0] => 6 [1] => 12 [2] => 19 [3] => 17 [4] => 6 )
