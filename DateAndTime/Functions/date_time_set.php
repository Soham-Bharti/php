<?php

// date_time_set()
// The date_time_set() function sets the time.

// Syntax
// date_time_set(object, hour, minute, second, microseconds)

$date = date_create();

date_time_set($date, 13, 24);
echo date_format($date, "Y-m-d H:i:s") . "<br>"; // 2024-02-05 13:24:00

date_time_set($date, 12, 20, 55);
echo date_format($date, "Y-m-d H:i:s"); // 2024-02-05 12:20:55
