<?php

// PHP strtok() Function
// The strtok() function splits a string into smaller strings (tokens).

// Syntax
// strtok(string,split)


// Split string one by one:

// In the example below, note that it is only the first call to strtok() that uses the string argument. After the first call, this function only needs the split argument, as it keeps track of where it is in the current string. To tokenize a new string, call strtok() with the string argument again:

$tokens = strtok("Hello, How are you?", " ");

var_dump($tokens);
while ($tokens !== false) {
    // var_dump($tokens);
    echo "$tokens<br>";
    $tokens = strtok(" ");
}

var_dump($tokens);
echo "<br>";


$tokens = strtok("Hello, How are you?", "H");

var_dump($tokens);
while ($tokens !== false) {
    // var_dump($tokens);
    echo "$tokens<br>";
    $tokens = strtok(" ");
}

var_dump($tokens);
echo "<br>";
