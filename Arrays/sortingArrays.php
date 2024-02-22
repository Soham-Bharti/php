<?php


// PHP Sorting Arrays
// The elements in an array can be sorted in alphabetical or numerical order, descending or ascending.

// PHP - Sort Functions For Arrays
// In this chapter, we will go through the following PHP array sort functions:

// sort() - sort arrays in ascending order
// rsort() - sort arrays in descending order
// asort() - sort associative arrays in ascending order, according to the value
// ksort() - sort associative arrays in ascending order, according to the key
// arsort() - sort associative arrays in descending order, according to the value
// krsort() - sort associative arrays in descending order, according to the key


// Sort Array in Ascending Order - sort()
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
print_r($cars); // Array ( [0] => BMW [1] => Toyota [2] => Volvo )
echo "<br>";

$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
print_r($numbers); // Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 11 [4] => 22 )
echo "<br>";



// Sort Array in Descending Order - rsort()
rsort($cars);
print_r($cars); // Array ( [0] => Volvo [1] => Toyota [2] => BMW )
echo "<br>";

rsort($numbers);
print_r($numbers); // Array ( [0] => 22 [1] => 11 [2] => 6 [3] => 4 [4] => 2 )
echo "<br>";



// Sort Array (Ascending Order), According to Value - asort()
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
asort($age);
print_r($age); // Array ( [Peter] => 35 [Ben] => 37 [Joe] => 43 )
echo "<br>";


// Sort Array (Ascending Order), According to Key - ksort()
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
ksort($age);
print_r($age); // Array ( [Ben] => 37 [Joe] => 43 [Peter] => 35 )
echo "<br>";


// Sort Array (Descending Order), According to Value - arsort()
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
arsort($age);
print_r($age); // Array ( [Joe] => 43 [Ben] => 37 [Peter] => 35 )
echo "<br>";


// Sort Array (Descending Order), According to Key - krsort()
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
krsort($age);
print_r($age); // Array ( [Peter] => 35 [Joe] => 43 [Ben] => 37 )
echo "<br>";

