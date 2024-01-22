<?php

// PHP soundex() Function
// Calculates the soundex key of a string

/*
Definition and Usage
The soundex() function calculates the soundex key of a string.

A soundex key is a four character long alphanumeric string that represent English pronunciation of a word.

The soundex() function can be used for spelling applications.

Note: The soundex() function creates the same key for similar sounding words.

*/

// Syntax
// soundex(string)

// Calculate the soundex key of "Soham":
$str = "Soham";
echo soundex($str);
echo "<br>";

$str1 = "Assistance";
$str2 = "Assistants";

echo soundex($str1);
echo "<br>";
echo soundex($str2);
echo "<br>";

// Tip: metaphone() is more accurate than soundex(), because metaphone() knows the basic rules of English pronunciation.

echo metaphone($str1);
echo "<br>";
echo metaphone($str2);
