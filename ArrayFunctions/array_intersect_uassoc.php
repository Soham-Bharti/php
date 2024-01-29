<?php

// array_intersect_uassoc()
// The array_intersect_uassoc() function compares the keys and values of two (or more) arrays, and returns the matches.

// Note: This function uses a user-defined function to compare the keys!

// This function compares the keys and values of two or more arrays, and return an array that contains the entries from array1 that are present in array2, array3, etc.



// Syntax
// array_intersect_uassoc(array1, array2, array3, ..., myfunction)


function myfunction($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b) ? 1 : -1;
}

$a1 = array("a" => "red", "b" => "green", "c" => "blue");
$a2 = array("d" => "red", "b" => "green", "e" => "blue");

$result = array_intersect_uassoc($a1, $a2, "myfunction");
print_r($result);


echo "<br>";


$a1 = array("a" => "red", "b" => "green", "c" => "blue");
$a2 = array("a" => "red", "b" => "green", "d" => "blue");
$a3 = array("e" => "yellow", "a" => "red", "d" => "blue");

$result = array_intersect_uassoc($a1, $a2, $a3, "myfunction");
print_r($result); // Array ( [a] => red )
