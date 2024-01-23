<?php

// PHP str_shuffle() Function
// The str_shuffle() function randomly shuffles all the characters of a string.

// Syntax 
// str_shuffle(string)

$name = "Soham Bharti";
echo str_shuffle($name) . "<br"; // oahhaBtirS m, aimhS rhtoaB, tmhiSBaahro, rhaimoBhSt a, oraS maBhiht, etc.

// Note: the space character is also shuffled as we can see above

$text = "SHUFFLE ME...";
echo str_shuffle($text); // EFFU. LM..SEH, .UHEFE SL.MF., SMEH. UFL.E.F, etc.
