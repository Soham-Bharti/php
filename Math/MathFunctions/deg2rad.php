<?php

// PHP deg2rad() Function
// The deg2rad() function converts a degree value to a radian value.

// Syntax
// deg2rad(number);

echo deg2rad("45") . "<br>";
echo deg2rad("90") . "<br>";
echo deg2rad("360") . "<br>";
$deg = 180;
$rad = deg2rad($deg);
echo "$deg degrees is equal to $rad radians."; // 180 degrees is equal to 3.1415926535898 radians.
