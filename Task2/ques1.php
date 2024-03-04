<?php

// 1) get current hours, and check if hours smaller then 12 print good morning,
// bigger then 12 and smaller then 16 then print good afternoon,
// and in the last print good evening.

date_default_timezone_set('Asia/Kolkata');

$currentHours = date('H') - 2;
echo $currentHours;
switch ($currentHours) {
    case $currentHours < 12 && $currentHours >= 0: {
            echo "Good Morning.<br>";
            break;
        }
    case $currentHours >= 12 && $currentHours < 16: {
            echo "Good Afternoon.<br>";
            break;
        }
    case $currentHours >= 16 && $currentHours < 24: {
            echo "Good Evening.<br>";
            break;
        }
    default:
        echo "Give a valid hour.<br>";
}
