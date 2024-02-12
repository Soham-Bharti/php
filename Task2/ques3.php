<?php

// 3) set cookie on specific time.
// example:- set 12:30 time , it will be automatically removed
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('H:i');
echo $currentTime;

setcookie('12:30-bjeKhatam', 'This cookie will be automatically removed after 12:30');
if ($currentTime == "12:30") {
    setcookie('12:30-bjeKhatam', 'This cookie will be automatically removed after 12:30', time() - 1);
}
print_r($_COOKIE);
