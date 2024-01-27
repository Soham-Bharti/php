<?php

// array_fill_keys()
// The array_fill_keys() function fills an array with values, specifying keys.


// Syntax
// array_fill_keys(keys, value)

$keys = [4, 5, 3, 2];
print_r(array_fill_keys($keys, 'monu')); // Array ( [4] => monu [5] => monu [3] => monu [2] => monu )

echo "<br>";

$keys2 = array('a', 'b', 'c', 'd', 'e', 'f');
print_r(array_fill_keys($keys2, 10)); // Array ( [a] => 10 [b] => 10 [c] => 10 [d] => 10 [e] => 10 [f] => 10 )
