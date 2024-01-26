<?php

// PHP Array Functions
// array()
// creates an array

// Syntax
// Syntax for indexed arrays:
// array(value1, value2, value3, etc.)

// Syntax for associative arrays:  
// array(key=>value,key=>value,key=>value,etc.)


$names = array("soham", "mohan", "chintu", 'priya');

// printing val of indexed array using for loop
for ($i = 0; $i < count($names); $i++) {
    echo $names[$i] . " "; // soham mohan chintu priya
}
echo "<br>";

// printing val of indexed array using foreach loop
foreach ($names as $x) {
    echo "$x "; // soham mohan chintu priya
}
echo "<br>";

// printing val of associative array using foreach loop
$places = array('bihar' => 'patna', 'gujrat' => 'ahemdabad', 'up' => 'lucknow');
foreach ($places as $x => $x_val) {
    echo "Key is $x and value is $x_val <br>";
}
// Key is bihar and value is patna
// Key is gujrat and value is ahemdabad
// Key is up and value is lucknow

echo "<br>";

// creating a associative multidimensional array
$arr = array(
    'names' => array('soham', 'chintu', 'mona'),
    'places' => array('bihar', 'gujrat', 'delhi'),
);
print_r($arr); // Array ( [names] => Array ( [0] => soham [1] => chintu [2] => mona ) [places] => Array ( [0] => bihar [1] => gujrat [2] => delhi ) )
