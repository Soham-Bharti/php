<?php

// PHP NaN

// NaN stands for Not a Number.

// NaN is used for impossible mathematical operations.

// PHP has the following functions to check if a value is not a number:

// is_nan()


$val = acos(7);
echo $val; // NaN
var_dump(is_nan($val)); // bool(true)

$val = acos(0);
echo $val; // 1.5707963267949
