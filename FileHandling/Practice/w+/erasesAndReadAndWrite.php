<?php

// w+ -> Open a file for read/write. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file


// *** IMPORTANT NOTE Below: at example 3

// $myFile = fopen('created.txt', 'w+') or die("Can not create file");
// echo fwrite($myFile, 'I am the new text in the created file'); // 37
// fclose($myFile);

// Output
// 37

// created.txt
// I am the new text in the created file



// # Example 2...

// existed.txt before
// I am text that has to be erased and overwritten.
$myFile = fopen('existed.txt', 'w+') or die("Can not create file");
echo fwrite($myFile, 'I am the new text in the created file after deleting the original content'); // 73
echo "<br>";
rewind($myFile); // Move the file pointer back to the beginning******
echo fread($myFile, filesize('existed.txt')); // I am the new text in the created file after deleting the original content
fclose($myFile);    

// Output
// 73

// existed.txt after
// I am the new text in the created file after deleting the original content


// IMPORTANT NOTE Below:

// Example 3: in this the existing.txt file will always be empty so we can not directly read it

// $myFile = fopen('existed.txt', 'w+') or die("Can not create file"); // deletes the content
// echo fread($myFile, filesize('existed.txt')); // Warning.....
// fclose($myFile);
