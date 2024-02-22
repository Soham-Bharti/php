<?php


// check string is palindrome or not (using string function).

$str = 'Naman';
$revStr = strtolower(strrev($str));

if (strtolower($str) == $revStr) {
    echo "Strig is palindrome";
} else {
    echo "Strig is not palindrome";
}
