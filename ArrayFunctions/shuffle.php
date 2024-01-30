<?php


// shuffle()
// The shuffle() function randomizes the order of the elements in the array.

// This function assigns new keys for the elements in the array. Existing keys will be removed (See Example below).

// Syntax
// shuffle(array)


$my_array = array("red", "green", "blue", "yellow", "purple");

shuffle($my_array);
print_r($my_array); // Array ( [0] => purple [1] => red [2] => yellow [3] => green [4] => blue ), Array ( [0] => green [1] => red [2] => blue [3] => yellow [4] => purple ), ...

echo "<br>";


$my_array = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow", "e" => "purple");

shuffle($my_array);
print_r($my_array); // Array ( [0] => purple [1] => yellow [2] => blue [3] => green [4] => red ), Array ( [0] => blue [1] => purple [2] => green [3] => yellow [4] => red ), ...
