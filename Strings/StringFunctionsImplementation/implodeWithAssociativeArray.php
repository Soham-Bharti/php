<?php
// Suppose you have an associative array representing user information
$userInfo = array(
    'name' => 'John Doe',
    'age' => 30,
    'location' => 'New York'
);

// Use implode() to join the values of the associative array into a string
$userInfoString = implode(', ', array_values($userInfo));

// Output the result
echo $userInfoString; // John Doe, 30, New York
