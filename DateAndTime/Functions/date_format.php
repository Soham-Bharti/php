<?php


// date_format()
// The date_format() function returns a date formatted according to the specified format.

// Syntax
// date_format(object, format)

$date = date_create("27th July 2020 10:39pm");
echo date_format($date, "Y/m/d H:i:s") . "<br>"; // 2020/07/27 22:39:00
echo date_format($date, "Y/m/d H:iP") . "<br>"; // 2020/07/27 22:39+02:00
// P - Difference to Greenwich time (GMT) in hours:minutes
