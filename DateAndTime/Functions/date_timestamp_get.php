<?php

// date_timestamp_get()
// The date_timestamp_get() function returns the Unix timestamp.

// Syntax
// date_timestamp_get(object)

echo date_timestamp_get(date_create()) . "<br>"; // 1707125783
echo date_timestamp_get(date_create('10-02-2020')); // 1581289200