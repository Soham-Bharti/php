<?php

// Get a Time


// H - 24-hour format of an hour (00 to 23)
// h - 12-hour format of an hour with leading zeros (01 to 12)
// i - Minutes with leading zeros (00 to 59)
// s - Seconds with leading zeros (00 to 59)
// a - Lowercase Ante meridiem and Post meridiem (am or pm)

echo "The time is " . date("h:i:sa") . "<br>"; // The time is 06:07:59am
// Note that the PHP date() function will return the current date/time of the server!


// Get Your Time Zone
date_default_timezone_set("America/New_York");
echo "The time in America/NYC is " . date("h:i:sa") . "<br>"; // The time in America/NYC is 12:16:12am
echo "The time in America/NYC is " . date("H:i:s") . "<br>"; // The time in America/NYC is 00:21:01

date_default_timezone_set("Asia/Kolkata");
echo "The time in INDIA is " . date("h:i:sa") . "<br>"; // The time in INDIA is 10:46:12am


date_default_timezone_set("Asia/Karachi");
echo "The time in Pakistan is " . date("h:i:sa") . "<br>"; // The time in Pakistan is 10:18:55am

// List of Supported Timezones
// Africa
// America
// Antarctica
// Arctic
// Asia
// Atlantic
// Australia
// Europe
// Indian
// Pacific
// Others
