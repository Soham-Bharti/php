<?php

// PHP strspn() Function
// The strspn() function returns the number of characters found in the string that contains only characters from the charlist parameter.

// Tip: Use the strcspn() function to return the number of characters found in a string before any part of the specified characters are found.

// Note: This function is binary-safe.

// Syntax
// strspn(string,charlist,start,length)

echo strspn("Soham", "am", 0) . "<br>"; // 0
echo strcspn("Soham", "am", 0) . "<br>"; // 3

echo strspn("Soham", "Soh", 0) . "<br>"; // 3
echo strcspn("Soham", "Soh", 0) . "<br>"; // 0

echo strspn("Soham", "oham") . "<br>"; // 0 -> counts only from start of string
echo strcspn("Soham", "oham") . "<br>"; // 1
