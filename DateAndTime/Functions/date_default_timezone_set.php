<?php


// date_default_timezone_set()
// The date_default_timezone_set() function sets the default timezone used by all date/time functions in the script.

// Syntax
// date_default_timezone_set(timezone)

date_default_timezone_set("Asia/Bangkok");
echo date_default_timezone_get() . "<br>"; // Asia/Bangkok
date_default_timezone_set("Asia/Kolkata");
echo date_default_timezone_get() . "<br>"; // Asia/Kolkata
date_default_timezone_set("Asia/Karachi");
echo date_default_timezone_get() . "<br>"; // Asia/Karachi