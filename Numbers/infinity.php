<?php

// PHP Infinity
// A numeric value that is larger than PHP_FLOAT_MAX is considered infinite.

// PHP has the following functions to check if a numeric value is finite or infinite:

//     is_finite()
//     is_infinite()


$max = PHP_FLOAT_MAX;
echo $max . "<br>"; // 1.7976931348623E+308
var_dump(is_infinite($max)); // bool(false)

var_dump(is_infinite($max + 1)); // bool(false) ???
