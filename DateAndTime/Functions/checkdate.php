<?php


// PHP checkdate() Function
// The checkdate() function is used to validate a Gregorian date.

// Syntax
// checkdate(month, day, year)

var_dump(checkdate(2, 29, 2023)); // bool(false)
echo (checkdate(2, 29, 2023)) . "<br>"; // 

var_dump(checkdate(2, 29, 2024)); // bool(true)
echo (checkdate(2, 29, 2024)) . "<br>"; // 1

var_dump(checkdate(7, 31, 2024)); // bool(true)
var_dump(checkdate(8, 31, 2024)); // bool(true)
var_dump(checkdate(9, 31, 2024)); // bool(false)
