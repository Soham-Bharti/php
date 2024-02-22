<?php

// Filters are used to filter the data either by validation or by sanitization

print_r(filter_list());
// Array ( [0] => int [1] => boolean [2] => float [3] => validate_regexp [4] => validate_domain [5] => validate_url [6] => validate_email [7] => validate_ip [8] => validate_mac [9] => string [10] => stripped [11] => encoded [12] => special_chars [13] => full_special_chars [14] => unsafe_raw [15] => email [16] => url [17] => number_int [18] => number_float [19] => add_slashes [20] => callback )

// Example
$name = "<h1>Soham Bharti</h1>";
echo $name . "<br>"; // Soham Bharti (bolded)
$sanitizedName = filter_var($name, FILTER_SANITIZE_STRING); // warning that it's deprecated
echo $sanitizedName . "<br>"; // Soham Bharti (normal)
