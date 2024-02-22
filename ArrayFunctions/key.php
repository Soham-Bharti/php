<?php

// key()
// The key() function returns the element key from the current internal pointer position.

// This function returns FALSE on error.

// Syntax
// key(array)

$people = array("Peter", "Joe", "Glenn", "Cleveland", "Soham", "Sonam");
echo "The key from the current position is: " . key($people) . "<br>"; // The key from the current position is: 0

next($people);

echo "The key from the current position is: " . key($people) . "<br>"; // The key from the current position is: 1

end($people);

echo "The key from the current position is: " . key($people) . "<br>"; // The key from the current position is: 5