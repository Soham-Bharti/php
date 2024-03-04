<?php

// getdate()
// The getdate() function returns date/time information of a timestamp or the current local date/time.

// Syntax
// getdate(timestamp)
echo time() . "<br>";
print_r(getdate(1707128016)); // Array ( [seconds] => 36 [minutes] => 13 [hours] => 11 [mday] => 5 [wday] => 1 [mon] => 2 [year] => 2024 [yday] => 35 [weekday] => Monday [month] => February [0] => 1707128016 )


echo "<br>";
print_r(getdate(1607128046)); // Array ( [seconds] => 26 [minutes] => 27 [hours] => 1 [mday] => 5 [wday] => 6 [mon] => 12 [year] => 2020 [yday] => 339 [weekday] => Saturday [month] => December [0] => 1607128046 )

echo "<br>";
print_r(getdate(1000000000)); // Array ( [seconds] => 40 [minutes] => 46 [hours] => 3 [mday] => 9 [wday] => 0 [mon] => 9 [year] => 2001 [yday] => 251 [weekday] => Sunday [month] => September [0] => 1000000000 )

echo "<br>";
print_r(getdate(9999999999)); // Array ( [seconds] => 39 [minutes] => 46 [hours] => 18 [mday] => 20 [wday] => 6 [mon] => 11 [year] => 2286 [yday] => 323 [weekday] => Saturday [month] => November [0] => 9999999999 )
