<?php

$input = 'soham_.Silversky123@yahoo.in';
$pattern = '/^[A-Za-z]{1,}(_[A-z][0-9]){0,}(\.?[A-z0-9]){1,}[^_]@{1}(gmail|yahoo)\.(com|in)$/';


if (preg_match($pattern, $input, $matches)) {
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}


// email validation without usage of _
// $pattern = '/^[A-Za-z]{1,}(\.?[A-z0-9]){1,}@{1}gmail\.(com|in)$/';

// email validation accepting the case -> we can use . and _ together
// $pattern = '/^[A-Za-z]{1,}(_[A-z][0-9]){0,}(\.?[A-z0-9]){1,}[^_]@{1}(gmail|yahoo)\.(com|in)$/';