<?php

// date_sun_info()
// The date_sun_info() function returns an array containing information about sunset/sunrise and twilight begin/end, for a specified day and location.

// Syntax
// date_sun_info(timestamp, latitude, longitude)

date_default_timezone_set("Asia/Kolkata");

$sun_info = date_sun_info(time(), 23.0225, 72.5714);
foreach ($sun_info as $key => $val) {
    echo "$key: " . date("H:i:s", $val) . "<br>";
}


// sunrise: 07:16:41
// sunset: 18:30:34
// transit: 12:53:37
// civil_twilight_begin: 06:54:33
// civil_twilight_end: 18:52:42
// nautical_twilight_begin: 06:27:42
// nautical_twilight_end: 19:19:32
// astronomical_twilight_begin: 06:01:06
// astronomical_twilight_end: 19:46:08