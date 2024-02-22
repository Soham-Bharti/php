<?php

// PHP strpbrk() Function
// The strpbrk() function searches a string for any of the specified characters.

// Note: This function is case-sensitive.

// This function returns the rest of the string from where it found the first occurrence of a specified character, otherwise it returns FALSE.


// Syntax
// strpbrk(string,charlist)

echo strpbrk("Hello World", "Hello") . "<br>"; // Hello World
echo strpbrk("Hello World", "World") . "<br>"; // llo World -> l came first in Hello
echo strpbrk("Hello world!", "oe") . "<br>"; // ello world! -> e came first in Hello

echo strpbrk("Hello world!", "W"); //
echo "<br>";
echo strpbrk("Hello world!", "w"); // world!
