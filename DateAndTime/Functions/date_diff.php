<?php

// date_diff()
// The date_diff() function returns the difference between two DateTime objects.

// Syntax
// date_diff(datetime1, datetime2, absolute)

$date1 = date_create("2002-02-15 10:00:08pm");
$date2 = date_create("2001-07-27 7:10pm");
$diff = date_diff($date1, $date2);

print_r($diff); // DateInterval Object ( [y] => 0 [m] => 6 [d] => 19 [h] => 2 [i] => 50 [s] => 8 [f] => 0 [weekday] => 0 [weekday_behavior] => 0 [first_last_day_of] => 0 [invert] => 1 [days] => 203 [special_type] => 0 [special_amount] => 0 [have_weekday_relative] => 0 [have_special_relative] => 0 )
echo "<br>";

print_r(get_object_vars($diff)); // Array ( [y] => 0 [m] => 6 [d] => 19 [h] => 2 [i] => 50 [s] => 8 [f] => 0 [weekday] => 0 [weekday_behavior] => 0 [first_last_day_of] => 0 [invert] => 1 [days] => 203 [special_type] => 0 [special_amount] => 0 [have_weekday_relative] => 0 [have_special_relative] => 0 )
echo "<br>";

echo $diff->format("%R%a days"); // -203 days
echo "<br>";

$diff = date_diff($date1, $date2, true);
echo $diff->format("%R%a days"); // +203 days
echo "<br>";

echo $diff->format("%R%a days %H hours %Iminutes %S seconds"); // +203 days 02 hours 50minutes 08 seconds
echo "<br>";
