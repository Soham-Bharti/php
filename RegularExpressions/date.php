<?php

// Date 1-1-2020 or 01-01-2020 or 100-1-2020

$input = "30-08-2022";
// $pattern = '/^[0-3]{0,1}[0-9]{1,1}-[0,1]{1,1}[0-9]{1,1}-[0-9]{4,4}$/';

// maan ke chal rhe h har months me 30,31 din hote h
// $pattern = '/(^[0]{1,1}[1-9]{1,1}|^[1-2]{0,1}[0-9]{1,1}|^[3]{1,1}[01]{1,1})-([0]{1,1}[1-9]{1,1}|[1]{1,1}[0-2]{1,1})-([0-9]{4,4}$)/';
$pattern = '/^(0[1-9]|[12][0-9]|3[01])-(0[1-9]|1[0-2])-\d{4}$/';

if (preg_match($pattern, $input, $matches)) {
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}


