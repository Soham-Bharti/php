<?php

// PHP str_split() Function
// The str_split() function splits a string into an array.

// Syntax
// str_split(string,length) --> Default length is 1

$str = "Hello, world";
print_r(str_split($str)); // Array ( [0] => H [1] => e [2] => l [3] => l [4] => o [5] => , [6] => [7] => w [8] => o [9] => r [10] => l [11] => d )
echo "<br>";

print_r(str_split($str, 1)); // Array ( [0] => H [1] => e [2] => l [3] => l [4] => o [5] => , [6] => [7] => w [8] => o [9] => r [10] => l [11] => d )
echo "<br>";

// print_r(str_split($str, 0)); // Fatal error: Uncaught ValueError
// echo "<br>";

print_r(str_split($str, 2)); // Array ( [0] => He [1] => ll [2] => o, [3] => w [4] => or [5] => ld )
echo "<br>";
