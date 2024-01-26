<?php

// PHP strrpos() Function
// The strrpos() function finds the position of the last occurrence of a string inside another string.

// Note: The strrpos() function is case-sensitive.

// Related functions:

// strpos() - Finds the position of the first occurrence of a string inside another string (case-sensitive)
// stripos() - Finds the position of the first occurrence of a string inside another string (case-insensitive)
// strripos() - Finds the position of the last occurrence of a string inside another string (case-insensitive)


// Syntax
// strrpos(string,find,start)

echo strrpos("Hello world! What a beautiful day!", "What") . "<br>"; // 13

echo strrpos("How are you? I asked him how he was.", "How") . "<br>"; // 0

echo strrpos("How are you? I asked him how he was.", "How", 1) . "<br>"; // 

echo strrpos("How are you? I asked him how he was.", "how") . "<br>"; // 25