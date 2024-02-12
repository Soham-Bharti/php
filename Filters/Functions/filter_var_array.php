<?php

// filter_var_array()
// The filter_var_array() function gets multiple variables and optionally filters them.

// This function is useful for filtering many values without calling filter_var() many times.

// Tip: Check the PHP Filter Reference for possible filters to use with this function.

// Syntax
// filter_var_array(data_array, args, add_empty)

$userInfo = array(
    "name" => "soham bharti",
    "email" => "soh@am@s.oham.com",
);
var_dump(filter_var_array($userInfo)); // array(2) { ["name"]=> string(12) "soham bharti" ["email"]=> string(16) "soh@am@s.oham.com" }

$userInfo = array(
    "email1" => "soham bharti",
    "email2" => "soham@soham.com",
);

var_dump(filter_var_array($userInfo, FILTER_VALIDATE_EMAIL)); // array(2) { ["email1"]=> bool(false) ["email2"]=> string(15) "soham@soham.com" }