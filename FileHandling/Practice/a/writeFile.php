<?php

// a -> Open a file for write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist

// var_dump(fopen('preserved.txt', 'a')); // resource(3) of type (stream)

// $myFile = fopen('preserved.txt', 'a') or die("Could not find the req file so I created one!"); // resource(3) of type (stream)
// echo fwrite($myFile, "I am the new text...added with the previous ones"); // 48
// fclose($myFile);

// Output
// 48

// preserved.txt
// I am a preserved text...I am the new text...added with the previous ones


$myFile = fopen('newCreated.txt', 'a') or die("Can't create the new file");
echo fwrite($myFile, "I am the text on your new created file"); // 38
fclose($myFile);

// Output 
// 38

// Newly created file newCreated.txt
// I am the text on your new created file