<?php

// PHP strripos() Function
// The strripos() function finds the position of the last occurrence of a string inside another string.


// Note: The strripos() function is case-insensitive.

// Related functions:

// stripos() - Finds the position of the first occurrence of a string inside another string (case-insensitive)
// strpos() - Finds the position of the first occurrence of a string inside another string (case-sensitive)
// strrpos() - Finds the position of the last occurrence of a string inside another string (case-sensitive)



// Syntax
// strripos(string,find,start)


echo strripos("Hello world! What a beautiful day!", "What") . "<br>"; // 13

echo strripos("How are you? I asked him how he was.", "How") . "<br>"; // 25

echo strripos("How are you? I asked him how he was.", "how") . "<br>"; // 25