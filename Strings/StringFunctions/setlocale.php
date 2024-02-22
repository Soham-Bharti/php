<?php

// PHP setlocale() Function
// Sets locale information
// Locale information is language, monetary, time and other information specific for a geographical area.

// Note: The setlocale() function changes the locale only for the current script.

// Tip: The locale information can be set to system default with setlocale(LC_ALL,NULL)

// Tip: To get numeric formatting information, see the localeconv() function.



// Syntax
// setlocale(constant,location)

echo setlocale(LC_ALL,"US");
echo "<br>";
echo setlocale(LC_ALL,NULL);
echo "<br>";
echo setlocale(LC_ALL, "IN");
echo "<br>";
echo setlocale(LC_ALL, "zh-Hant-TW");
echo "<br>";

