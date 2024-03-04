<?php

// date_timezone_set()
// The date_timezone_set() function sets the time zone for the DateTime object.

// Syntax
// date_timezone_set(object, timezone)

$date = date_create("2013-05-25", timezone_open("Asia/Kolkata"));
echo date_format($date, "Y-m-d H:i:sP") . "<br>"; // 2013-05-25 00:00:00+05:30

date_timezone_set($date, timezone_open("Europe/Paris"));
echo date_format($date, "Y-m-d H:i:sP"); // 2013-05-24 20:30:00+02:00
