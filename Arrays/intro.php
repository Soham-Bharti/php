<?php

// PHP Arrays
// An array stores multiple values in one single variable:

$names = array('soham', 'monu', 'sonu', 'abhishek', 'anant');
var_dump($names); // array(5) { [0]=> string(5) "soham" [1]=> string(4) "monu" [2]=> string(4) "sonu" [3]=> string(8) "abhishek" [4]=> string(5) "anant" }
echo "<br>";

$places = ["ahemdabad", "bihar", "madhya pradesh"];
var_dump($places); // array(3) { [0]=> string(9) "ahemdabad" [1]=> string(5) "bihar" [2]=> string(14) "madhya pradesh" }

// What is an Array?
// An array is a special variable that can hold many values under a single name, and you can access the values by referring to an index number or name.


// PHP Array Types
// In PHP, there are three types of arrays:

// 1. Indexed arrays - Arrays with a numeric index
// 2. Associative arrays - Arrays with named keys
// 3. Multidimensional arrays - Arrays containing one or more arrays

// Array items of four different data types:
function myFunction()
{
    // code
}
$myArr = array("Volvo", 15, ["apples", "bananas"], myFunction());
