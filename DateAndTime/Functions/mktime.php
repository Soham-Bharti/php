<?php

// mktime()
// The mktime() function returns the Unix timestamp for a date.

// Syntax
// mktime(hour, minute, second, month, day, year, is_dst)

echo "On 27th July 2020 - " . date("l", mktime(0, 0, 0, 07, 27, 2020)) . "<br>"; // On 27th July 2020 - Monday

echo "Was 2020 a leap year- " . date("L", mktime(0, 0, 0, 1, 1, 2020)); // Was 2020 a leap year- 1
