<?php

// date_timezone_get()
// The date_timezone_get() function returns the time zone of the given DateTime object.

// Syntax
// date_timezone_get(object)

echo timezone_name_get(date_timezone_get(date_create())); // Europe/Berlin
