<?php

// PHP is_infinite() Function
// The is_infinite() function checks whether a value is infinite or not.

// This function returns true (1) if the specified value is an infinite number, otherwise it returns false/nothing.

// The value is infinite if it is outside the allowed range for a PHP float on this platform.

echo is_infinite(2) . "<br>"; //
echo is_infinite(log(0)) . "<br>"; // 1
echo is_infinite(2000); // 
