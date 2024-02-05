<?php

// Create a Date With mktime()
// The PHP mktime() function returns the Unix timestamp for a date. The Unix timestamp contains the number of seconds between the Unix Epoch (January 1 1970 00:00:00 GMT) and the time specified.

// Syntax
// mktime(hour, minute, second, month, day, year)

$date = mktime(10, 20, 5, 1, 1, 0);
echo "Created date is " . date('d/m/Y', $date) . "<br>"; // Created date is 01/01/2000

$date = mktime(10, 20, 5, 1, 1, 89);
// echo date_default_timezone_get(); // Europe/Berlin
echo "Created date is " . date('d/m/Y h:i:sa', $date) . "<br>";  // Created date is Created date is 01/01/1989 10:20:05am


// Create a Date From a String With strtotime()
// The PHP strtotime() function is used to convert a human readable date string into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).

// Syntax
// strtotime(time, now)

$date = strtotime("27th July 2002 7pm");
echo "Back to time when I was born " . date("H:m:s d/m/Y", $date) . "<br>"; // Back to time when I was born 19:07:00 27/07/2002


date_default_timezone_set("Asia/Kolkata");
$d = strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>"; // 2024-02-06 12:00:00am

$d = strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>"; // 2024-05-05 11:14:36am

$d = strtotime("next Monday");
echo date("Y-m-d h:i:sa", $d) . "<br>"; // 2024-02-12 12:00:00am

$d = strtotime("previous Monday");
echo date("Y-m-d h:i:sa", $d) . "<br>"; // 2024-01-29 12:00:00am

// strtotime() is not perfect, so remember to check the strings you put in there.
$startdate = strtotime("today");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
    echo date("M d", $startdate) . "<br>";
    $startdate = strtotime("+1 week", $startdate);
}
// Feb 05
// Feb 12
// Feb 19
// Feb 26
// Mar 04
// Mar 11

echo "The time is " . time() . "<br>"; // The time is 1707113350

$d1 = strtotime("Feb 6th 2024");
$d2 = floor(($d1 - time()) / 60 / 60 / 24);
echo "Tomorrow is after $d2 days or " . floor(($d1 - time()) / 60 / 60) . " hours or " . floor(($d1 - time()) / 60) . " minutes or " . (($d1 - time())) . " seconds";


echo "<br>";

