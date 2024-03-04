<?php

// date_parse()
// The date_parse() function returns an associative array with detailed information about a specified date.

// Syntax
// date_parse(date)

print_r(date_parse(date('05-02-2024'))); // Array ( [year] => 2024 [month] => 2 [day] => 5 [hour] => [minute] => [second] => [fraction] => [warning_count] => 0 [warnings] => Array ( ) [error_count] => 0 [errors] => Array ( ) [is_localtime] => )


echo "<br>";

print_r(date_parse(date('27-07-2002 7:30:10pm'))); // Array ( [year] => 2002 [month] => 7 [day] => 27 [hour] => 7 [minute] => 30 [second] => 10 [fraction] => 0 [warning_count] => 0 [warnings] => Array ( ) [error_count] => 2 [errors] => Array ( [24] => Unexpected character [25] => Unexpected character ) [is_localtime] => 1 [zone_type] => 1 [zone] => 3600 [is_dst] => )
echo "<br>";

print_r(date_parse(date('27/07/2002 7:30:10pm'))); // Array ( [year] => 2002 [month] => 7 [day] => 7 [hour] => 7 [minute] => 30 [second] => 10 [fraction] => 0 [warning_count] => 0 [warnings] => Array ( ) [error_count] => 3 [errors] => Array ( [0] => Unexpected character [24] => Unexpected character [25] => Unexpected character ) [is_localtime] => 1 [zone_type] => 1 [zone] => 3600 [is_dst] => )
echo "<br>";

print_r(date_parse(date('27.07.2002 7:30:10pm'))); // Array ( [year] => 2002 [month] => 7 [day] => 27 [hour] => 7 [minute] => 30 [second] => 10 [fraction] => 0 [warning_count] => 0 [warnings] => Array ( ) [error_count] => 2 [errors] => Array ( [24] => Unexpected character [25] => Unexpected character ) [is_localtime] => 1 [zone_type] => 1 [zone] => 3600 [is_dst] => )
