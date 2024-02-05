<?php

// date()
// The date() function formats a local date and time, and returns the formatted date string.

// Syntax
// date(format,timestamp)

echo date('l') . "<br>"; // Monday
echo date("l jS M Y h:i:s A") . "<br>"; // Monday 5th Feb 2024 11:09:16 AM

// Use a constant in the format parameter
echo date(DATE_RFC822) . "<br>"; // Mon, 05 Feb 24 11:10:00 +0100

echo "On 27th July 2001, it was " . date('l', mktime(0, 0, 0, 7, 27, 2001)) . "<br>"; // On 27th July 2001, it was Friday

// prints something like: 1975-10-03T00:00:00+00:00
echo date(DATE_ATOM, mktime(0, 0, 0, 10, 3, 1975)) . "<br>"; // 1975-10-03T00:00:00+01:00
