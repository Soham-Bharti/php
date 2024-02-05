<?php

// PHP date_add() Function
// The date_add() function adds some days, months, years, hours, minutes, and seconds to a date.

// Syntax
// date_add(object, interval)

$date = date_create("2024-02-5");
date_add($date, date_interval_create_from_date_string("4 days"));
echo date_format($date, "Y-m-d") . "<br>"; // 2024-02-09

date_add($date, date_interval_create_from_date_string("365 days"));
echo date_format($date, "Y-m-d") . "<br>"; // 2025-02-08

 
// Timezones can be one of three different types in DateTime objects:

//     Type 1; A UTC offset, such as in new DateTime("17 July 2013 -0300");
//     Type 2; A timezone abbreviation, such as in new DateTime("17 July 2013 GMT");
//     Type 3: A timezone identifier, such as in new DateTime( "17 July 2013", new DateTimeZone("Europe/London"));