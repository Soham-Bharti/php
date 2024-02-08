<?php

// The PHP Date() Function


// Syntax
// date(format,timestamp)

// echo "Today's date is " . date("dd-MM-yyyy"); // Today's date is 0505-FebFeb-24242424
echo "Today's date is " . date("d-M-y") . "<br>"; // Today's date is 05-Feb-24

// d - Represents the day of the month (01 to 31)
// m - Represents a month (01 to 12)
// Y - Represents a year (in four digits)
// l (lowercase 'L') - Represents the day of the week

echo "Today's date is " . date("d/M/y") . "<br>"; // Today's date is 05/Feb/24
echo "Today's date is " . date("d.M.y") . "<br>"; // Today's date is 05.Feb.24
echo "Today's date is " . date("d|M|y") . "<br>"; // Today's date is 05|Feb|24
echo "Today's date is " . date("dMy") . "<br>"; // Today's date is 05Feb24
echo "Today is " . date("l") . "<br>"; // Today is Monday


// PHP Tip - Automatic Copyright Year
// Use the date() function to automatically update the copyright year on your website:

echo "&copy; 2018-" . date('y');
