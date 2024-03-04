<?php

// date_timestamp_set()
// The date_timestamp_set() function sets the date and time based on a Unix timestamp.

// Syntax
// date_timestamp_set(object, unixtimestamp)

$date = date_create();
date_timestamp_set($date,  1707125816);
echo date_format($date, 'Y-m-d H:i:s') . "<br>"; // 2024-02-05 10:36:56

$date = date_create('10-02-2020 7:30pm');
date_timestamp_set($date,  1581289200);
echo date_format($date, 'Y-m-d H:i:sa') . "<br>"; // 2020-02-10 00:00:00am ?????

$date = date_create('10-02-2020');
date_timestamp_set($date,  1581289200);
echo date_format($date, 'Y-m-d') . "<br>"; // 2020-02-10