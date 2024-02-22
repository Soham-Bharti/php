<?php

// Quantifiers
/* 
Quantifiers define quantities:

    Quantifier	Description
    n+	        Matches any string that contains at least one n
    n*	        Matches any string that contains zero or more occurrences of n
    n?	        Matches any string that contains zero or one occurrences of n
    n{x}	    Matches any string that contains a sequence of X n's
    n{x,y}	    Matches any string that contains a sequence of X to Y n's
    n{x,}	    Matches any string that contains a sequence of at least X n's
*/


// n+: Matches any string that contains at least one 'n'
$pattern = '/n+/';
$input = 'okay banana';
if (preg_match($pattern, $input, $matches)) { // Match found: n
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}


// n: Matches any string that contains zero or more occurrences of 'n'
$pattern = '/n*/';
$input = 'nnnn';
if (preg_match($pattern, $input, $matches)) { // Match found: nnnn
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}


// n?: Matches any string that contains zero or one occurrences of 'n'
$pattern = '/n?/';
$input = 'banana';
if (preg_match($pattern, $input, $matches)) { // Match found:
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}


// n{x}: Matches any string that contains a sequence of X 'n's
$pattern = '/n{2}/';
$input = 'banana';
if (preg_match($pattern, $input, $matches)) { // No match found.
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}

$input = 'banna';
if (preg_match($pattern, $input, $matches)) { // Match found: nn
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}


// n{x,y}: Matches any string that contains a sequence of X to Y 'n's
$pattern = '/n{2,4}/';
$input = 'banana';
if (preg_match($pattern, $input, $matches)) { // No matche found
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}

$input = 'bannnna';
if (preg_match($pattern, $input, $matches)) { // Match found: nnnn
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}

// n{x,}: Matches any string that contains a sequence of at least X 'n's
$pattern = '/n{2,}/';
$input = 'banana';
if (preg_match($pattern, $input, $matches)) { // No match found.
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}

$input = 'banna';
if (preg_match($pattern, $input, $matches)) { // Match found: nn
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}
