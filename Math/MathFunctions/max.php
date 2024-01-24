<?php

// PHP max() Function
// The max() function returns the highest value in an array, or the highest value of several specified values.

echo (max(2, 4, 6, 8, 10) . "<br>"); // 10
echo (max(22, 14, 68, 18, 15) . "<br>"); // 68
echo (max(array(4, 6, 8, 10)) . "<br>"); // 10
echo (max(array(44, 16, 81, 12)) . "<br>"); // 81
echo (max(array('soham', 16, 81, 12)) . "<br>"); // soham
echo (max(array('tarun', 16, 81, 'soham', 12))); // tarun
