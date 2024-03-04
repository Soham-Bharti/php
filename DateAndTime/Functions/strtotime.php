<?php

// strtotime()
// The strtotime() function parses an English textual datetime into a Unix timestamp (the number of seconds since January 1 1970 00:00:00 GMT).

// Syntax
// strtotime(time, now);

echo strtotime('now') . "<br>"; // 1707129866
echo strtotime('today') . "<br>"; // 1707087600
echo strtotime('05-02-2024') . "<br>"; // 1707087600
echo strtotime('tomorrow') . "<br>"; // 1707174000
echo strtotime('06-02-2024') . "<br>"; // 1707174000
echo strtotime("3 October 2005") . "<br>"; // 1128290400
echo strtotime("+5 hours") . "<br>"; // 1707147937
echo strtotime("+1 week") . "<br>"; // 1707734737
echo strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>"; // 1708019142
echo strtotime("next Monday") . "<br>"; // 1707692400
echo strtotime("last Sunday"); // 1707001200
