<?php

// PHP addslashes() Function
// Returns a string with backslashes in front of predefined characters

// The predefined characters are:
// single quote (')
// double quote (")
// backslash (\)
// NULL

$str = addslashes('What does "yolo" mean?');
echo $str . "<br>"; // What does \"yolo\" mean?

$str = addslashes("What does 'yolo' mean?");
echo $str . "<br>"; // What does \'yolo\' mean?

$str = addslashes("Why are you \ waiting?");
echo $str . "<br>"; // Why are you \\ waiting?

$str = addslashes("Why are you \n waiting?");
echo $str . "<br>"; // Why are you waiting?

