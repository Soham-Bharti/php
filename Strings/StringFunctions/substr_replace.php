<?php

// PHP substr_replace() Function
// The substr_replace() function replaces a part of a string with another string.

// Note: If the start parameter is a negative number and length is less than or equal to start, length becomes 0.

// Note: This function is binary-safe.


// Syntax
// substr_replace(string,replacement,start,length)

echo substr_replace("Hello", "soham", 0) . "<br>"; // soham

echo substr_replace("Hello soham", "earth", 6) . "<br>"; // Hello earth
echo substr_replace("Hello soham", "earth", 5) . "<br>"; // Helloearth

echo substr_replace("Hello soham", "earth", -5) . "<br>"; // Hello earth
echo substr_replace("Hello soham", "earth", -6) . "<br>"; // Helloearth


// length --> 0 - Insert instead of replace
echo substr_replace("world", "Hello ", 0, 0); // Hello world
