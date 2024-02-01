<?php

// preg_grep()
// PHP preg_grep() Function
// The preg_grep() function returns an array containing only elements from the input that match the given pattern.


// Syntax
// preg_grep(pattern, input, flags)

$input = [
    "Red",
    "Pink",
    "Green",
    "Blue",
    "Purple"
];

$result = preg_grep("/^p/i", $input);
print_r($result); // Array ( [1] => Pink [4] => Purple )
echo "<br>";

$result = preg_grep("/^p/i", $input, PREG_GREP_INVERT);
print_r($result); // Array ( [1] => Pink [4] => Purple )

echo "<br>";

$names = array(
    "Soham",
    "Monu",
    "Shivam",
    "Rahul",
    "Amaresh",
    "Shubham",
);

print_r(preg_grep("/am/i", $names)); // Array ( [0] => Soham [2] => Shivam [4] => Amaresh [5] => Shubham )

echo "<br>";

$numbers = [8979384923, 8272618446, 97252817645, 5938272974, 9406922714, 4992793234];
print_r(preg_grep("/^9/", $numbers)); // Array ( [2] => 97252817645 [4] => 9406922714 )

echo "<br>";

print_r(preg_grep("/^9/", $numbers, PREG_GREP_INVERT)); // Array ( [0] => 8979384923 [1] => 8272618446 [3] => 5938272974 [5] => 4992793234 )
