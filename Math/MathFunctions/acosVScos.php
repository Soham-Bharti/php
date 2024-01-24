<?php


// acos() V/S cos()

// cos is the cosine function, which calculates the cosine of an angle.
// It takes an angle in radians as its argument and returns the cosine of that angle.
// The cosine of an angle is the ratio of the length of the adjacent side to the hypotenuse in a right-angled triangle.

$angleInRadians = deg2rad(45); // Convert degrees to radians
$cosineValue = cos($angleInRadians);
echo "Cosine of 45 degrees: $cosineValue";

// acos is the arccosine function, which is the inverse of the cosine function.
// It takes a value between -1 and 1 (inclusive) as its argument and returns the angle (in radians) whose cosine is that value.
// The result is always in the range [0, π].


$cosineValue = 0.7071; // Some arbitrary cosine value
$angleInRadians = acos($cosineValue);
echo "Angle whose cosine is approximately 0.7071: $angleInRadians radians";
