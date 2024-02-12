<?php

// filter_var()
// The filter_var() function filters a variable with the specified filter.

// Syntax
// filter_var(var, filtername, options)

var_dump(filter_var("123", FILTER_VALIDATE_INT)); // int(123)
var_dump(filter_var("12dq3", FILTER_VALIDATE_INT)); // bool(false)
var_dump(filter_var("12soham@gmail.co.in", FILTER_VALIDATE_EMAIL)); // string(19) "12soham@gmail.co.in"
var_dump(filter_var("12sohamgmail.co.in", FILTER_VALIDATE_EMAIL)); // bool(false)
var_dump(filter_var("12soham@g@mail.co.in", FILTER_VALIDATE_EMAIL)); // bool(false)
