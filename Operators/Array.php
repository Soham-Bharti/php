<?php

// Array Operations

// +	Union	$x + $y	Union of $x and $y	
// ==	Equality	$x == $y	Returns true if $x and $y have the same key/value pairs	
// ===	Identity	$x === $y	Returns true if $x and $y have the same key/value pairs in the same order and of the same types	
// !=	Inequality	$x != $y	Returns true if $x is not equal to $y	
// <>	Inequality	$x <> $y	Returns true if $x is not equal to $y	
// !==	Non-identity	$x !== $y	Returns true if $x is not identical to $y

$arr = array('0' => 1, '1' => 2, '2' => 33);
$brr = array('3' => 1, '4' => 2, '5' => 33);

// $arr = [1, 2, 3];
// $brr = array(1, 2, 3); 
// not working for union -> only associative array works


$crr = $arr + $brr;
print_r($crr); // Array ( [0] => 1 [1] => 2 [2] => 33 [3] => 4 [4] => 5 [5] => 66 )
echo "<br>";

$arr = [1, 2, 3];
$brr = array(1, 2, 3);

var_dump($arr == $brr); // bool(true)
echo "<br>";
var_dump($arr === $brr); // bool(true)
echo "<br>";

var_dump($arr != $brr); // bool(false)
echo "<br>";
var_dump($arr <> $brr); // bool(false)
echo "<br>";

$brr = array("1", "2", "3");
var_dump($arr === $brr); // bool(false)
echo "<br>";
var_dump($arr !== $brr); // bool(true)
echo "<br>";
