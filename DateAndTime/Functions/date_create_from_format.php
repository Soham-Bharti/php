<?php


// PHP date_create_from_format() Function
// The date_create_from_format() function returns a new DateTime object formatted according to the specified format.

// Syntax
// date_create_from_format(format, time, timezone)


/*
d - Day of the month; with leading zeros
j - Day of the month; without leading zeros
D - Day of the month (Mon - Sun)
l - Day of the month (Monday - Sunday)
S - English suffix for day of the month (st, nd, rd, th)
F - Monthname (January - December)
M - Monthname (Jan-Dec)
m - Month (01-12)
n - Month (1-12)
Y - Year (e.g 2013)
y - Year (e.g 13)
a and A - am or pm
g - 12 hour format without leading zeros
G - 24 hour format without leading zeros
h - 12 hour format with leading zeros
H - 24 hour format with leading zeros
i - Minutes with leading zeros
s - Seconds with leading zeros
u - Microseconds (up to six digits)
e, O, P and T - Timezone identifier
U - Seconds since Unix Epoch
(space)
# - One of the following separation symbol: ;,:,/,.,,,-,(,)
? - A random byte
* - Random bytes until next separator/digit
! - Resets all fields to Unix Epoch
| - Resets all fields to Unix Epoch if they have not been parsed yet
+ - If present, trailing data in the string will cause a warning, not an error
*/

$date = date_create_from_format("j-M-Y", "6-Feb-2024", new DateTimeZone('Asia/Kolkata'));
echo date_format($date, "Y/m/d h:i:s") . "<br>"; // 2024/02/05 12:52:56
echo date_format($date, "Y/m/d h:i:s:u"); // 2024/02/06 12:59:47:000000
