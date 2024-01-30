<?php

// array_sum()
// The array_sum() function returns the sum of all the values in the array.


// Syntax
// array_sum(array)

$a = array(5, 15, 25);
echo array_sum($a) . "<br>"; // 45

$a = array(5, 15, 25, '1soham', 'soham1');
echo array_sum($a) . "<br>"; // 46

$a = array(5, 15, 25, '1soham', 'soham1', true);
echo array_sum($a) . "<br>"; // 47

$a = array("a" => 52.2, "b" => 13.7, "c" => 0.9);
echo array_sum($a); // 66.8
