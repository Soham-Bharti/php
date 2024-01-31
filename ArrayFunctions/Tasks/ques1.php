<?php


// Q1. From the array $prices = [25.5, 30.8, 18.2, 22.1, 15.9], find the average of the prices after excluding the two highest values.

$prices = [25.5, 30.8, 18.2, 22.1, 15.9];
sort($prices);
array_splice($prices, 3);
$avg = array_sum($prices) / count($prices);
echo $avg;

