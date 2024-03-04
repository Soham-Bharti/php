<?php

// PHP date_create() Function
// The date_create() function returns a new DateTime object.

// Syntax
// date_create(time, timezone)

$date = date_create("2013-03-15");
print_r($date); // DateTime Object ( [date] => 2013-03-15 00:00:00.000000 [timezone_type] => 3 [timezone] => Europe/Berlin )

echo "<br>";

date_default_timezone_set("Asia/Kolkata");
$date = date_create("2013-03-15");
print_r($date); // DateTime Object ( [date] => 2013-03-15 00:00:00.000000 [timezone_type] => 3 [timezone] => Asia/Kolkata )

echo "<br>";

$dateOfBirth = date_create("27th July 2002 7:10pm");
print_r($dateOfBirth); // DateTime Object ( [date] => 2002-07-27 19:10:00.000000 [timezone_type] => 3 [timezone] => Asia/Kolkata )

echo "<br>";

$date = date_create("2013-03-15 23:40:00", timezone_open("Europe/Oslo"));
echo date_format($date, "Y/m/d H:iP"); // 2013/03/15 23:40+01:00

echo "<br>";

$date = date_create("2013-03-15 23:40:00", timezone_open("Asia/Kolkata"));
echo date_format($date, "Y/m/d H:iP"); // 2013/03/15 23:40+05:30


// Timezones can be one of three different types in DateTime objects:

//     Type 1; A UTC offset, such as in new DateTime("17 July 2013 -0300");
//     Type 2; A timezone abbreviation, such as in new DateTime("17 July 2013 GMT");
//     Type 3: A timezone identifier, such as in new DateTime( "17 July 2013", new DateTimeZone("Europe/London"));