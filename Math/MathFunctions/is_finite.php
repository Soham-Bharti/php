<?php


// PHP is_finite() Function
// The is_finite() function checks whether a value is finite or not.

// This function returns true (1) if the specified value is a finite number, otherwise it returns false/nothing.

// The value is finite if it is within the allowed range for a PHP float on this platform.


// Syntax
// is_finite(value);

echo is_finite(2) . "<br>"; // 1
echo is_finite(log(0)) . "<br>"; //
echo is_finite(2000); // 1
