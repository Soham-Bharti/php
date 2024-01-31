<?php

// Q2. Starting with the array $data = [8, 15, 3, 7, 10, 5], create a new array that contains the square of each number, filter out the numbers less than 50, and then calculate the sum of the remaining values.


$data = [8, 15, 3, 7, 10, 5];

// created a new array that contains the square of each number
$newArray = array_map(function ($x) {
    return pow($x, 2);
}, $data);

// filter out the numbers less than 50
$remainingNumbers = array_filter($newArray, function ($val) {
    return $val < 50;
});

// calculate the sum of the remaining values.
echo "Sum of the remaining numbers = " . array_sum($remainingNumbers);
