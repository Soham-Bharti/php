<?php


// in_array()
// The in_array() function searches an array for a specific value.

// Note: If the search parameter is a string and the type parameter is set to TRUE, the search is case-sensitive.


// Syntax
// in_array(search, array, type)
$people = array("Peter", "Joe", "Glenn", "Cleveland");

if (in_array("Glenn", $people)) { // Match found
    echo "Match found ";
} else {
    echo "Match not found";
}

echo "<br>";

$people = array("Peter", "Joe", "Glenn", "Cleveland", 23);

if (in_array("23", $people, TRUE)) { // Match not found
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}


if (in_array(23, $people, TRUE)) { // Match found
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}


if (in_array("Glenn", $people, TRUE)) { // Match found
    echo "Match found<br>";
} else {
    echo "Match not found<br>";
}
