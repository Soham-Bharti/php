<?php


// preg_last_error()
// PHP preg_last_error() Function
// The preg_last_error() function returns an error code for the most recently evaluated regular expression.
// Returns the error code of the last PCRE regex execution

// Syntax
// preg_last_error()


$str = 'The regular expression is invalid.';
$pattern = '/invalid//';
$match = @preg_match($pattern, $str, $matches);

if ($match === false) {
    // An error occurred
    $err = preg_last_error();
    echo "Error: $err <br>"; // 1
    if ($err == PREG_INTERNAL_ERROR) { // Invalid regular expression.
        echo 'Invalid regular expression.';
    }
} else if ($match) {
    // A match was found
    echo "Match Found - " . $matches[0];
} else {
    // No matches were found
    echo 'No matches found';
}

echo "<br>";

$str = 'The regular expression is invalid.';
$pattern = '/regular\\/';
$match = @preg_match($pattern, $str, $matches);

if ($match === false) {
    // An error occurred
    $err = preg_last_error();
    if ($err == PREG_INTERNAL_ERROR) { // Invalid regular expression.
        echo 'Invalid regular expression.';
    }
} else if ($match) {
    // A match was found
    echo "Match Found - " . $matches[0];
} else {
    // No matches were found
    echo 'No matches found';
}

echo "<br>";

$str = 'regular.. expression is invalid.';
$pattern = '/^regular\./';
$match = @preg_match($pattern, $str, $matches);

if ($match === false) {
    // An error occurred
    $err = preg_last_error();
    if ($err == PREG_INTERNAL_ERROR) { 
        echo 'Invalid regular expression.';
    }
} else if ($match) { // Match Found - regular.
    // A match was found
    echo "Match Found - " . $matches[0];
} else {
    // No matches were found
    echo 'No matches found';
}
