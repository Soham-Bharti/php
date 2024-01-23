<?php

// PHP strcspn() Function
// The strcspn() function returns the number of characters (including whitespaces) found in a string before any part of the specified characters are found.

echo strcspn("Hello World", "o") . "<br>"; // 4
echo strcspn("Hello World", "z") . "<br>"; // 11
echo strcspn("Hello World", "w") . "<br>"; // 11
echo strcspn("Hello World", "Lo") . "<br>"; // 4

// Parameter	Description
// string	Required. Specifies the string to search
// char	Required. Specifies the characters to search for
// start	Optional. Specifies where in string to start
// length	Optional. Specifies the length of the string (how much of the string to search)

echo strcspn("Hello World", "o", 6) . "<br>"; // 1
echo strcspn("Hello World", "o", 0, 10) . "<br>"; // 4
echo strcspn("Hello World", "o", 3, 0) . "<br>"; // 0
echo strcspn("Hello World", "o", 4, 0) . "<br>"; // 0
echo strcspn("Hello World", "o", 5, 2) . "<br>"; // 2
echo strcspn("Hello World", "o", 6, 2) . "<br>"; // 1
