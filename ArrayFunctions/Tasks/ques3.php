<?php

// Q3. From the array $words = ["apple", "banana", "orange", "kiwi", "grape"], create a new array where each word is replaced by its reverse, and then sort the resulting array alphabetically.

$words = ["apple", "banana", "orange", "kiwi", "grape"];

// created a new array where each word is replaced by its reverse
$revArray = array_map(function ($word) {
    return strrev($word);
}, $words);

// sorted the resulting array alphabetically
sort($revArray);

// printed the required resultant array
print_r($revArray);
