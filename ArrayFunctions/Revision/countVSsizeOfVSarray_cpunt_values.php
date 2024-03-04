<?php

$fruits = ['apple', 'banana', 'cherry'];

echo count($fruits); // 3

echo "<br>";

echo sizeof($fruits); // 3

echo "<br>";

$food = array(
    'fruits' => array('apple', 'banana', 'cherry'),
    'vegies' => array('carrot', 'bhindi', 'bringal'),
);

echo count($food); // 2

echo "<br>";

echo sizeof($food); // 2

echo "<br>";

echo count($food, 1); // 8

echo "<br>";

echo sizeof($food, 1); // 8

echo "<br>";

print_r(array_count_values($fruits)); // Array ( [apple] => 1 [banana] => 1 [cherry] => 1 )

echo "<br>";

// print_r(array_count_values($food)); // array_count_values(): Can only count string and integer values, entry skipped in
