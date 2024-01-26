<?php

// PHP ucwords() Function
// The ucwords() function converts the first character of each word in a string to uppercase.

// Syntax
// ucwords(string, delimiters)

echo ucwords("hello soham how are you?") . "<br>"; // Hello Soham How Are You?
echo ucwords("Hello Soham how are you?") . "<br>"; // Hello Soham How Are You?

echo ucwords("hel-lo so-ham h-ow are you?", "-") . "<br>"; // Hel-Lo so-Ham h-Ow are you?
echo ucwords("hello soham how are you?", ".") . "<br>"; // Hello soham how are you?
