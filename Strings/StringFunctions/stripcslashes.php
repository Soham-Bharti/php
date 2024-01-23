<?php

// PHP stripcslashes() Function
// The stripcslashes() function removes backslashes added by the addcslashes() function.

// Syntax
// stripcslashes(string)

echo stripcslashes("Hello Soham \How Are You?<br>"); // Hello Soham How Are You?

$str = addcslashes("Hello, world!", "w ");
echo $str . "<br>"; // Hello,\ \world!
echo stripcslashes($str); // Hello, world!
