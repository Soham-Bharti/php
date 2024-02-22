<?php

// PHP Open File - fopen()
// A better method to open files is with the fopen() function. This function gives you more options than the readfile() function.
// The first parameter of fopen() contains the name of the file to be opened and the second parameter specifies in which mode the file should be opened.

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// var_dump($myfile); // resource(3) of type (stream)
echo fread($myfile, filesize("webdictionary.txt")) . "<br>"; // AJAX = Asynchronous JavaScript and XML CSS = Cascading Style Sheets HTML = Hyper Text Markup Language PHP = PHP Hypertext Preprocessor SQL = Structured Query Language SVG = Scalable Vector Graphics XML = EXtensible Markup Language
echo filesize("webdictionary.txt"); // 236 (number of characters)
// echo "File size in Bits = " . filesize("webdictionary.txt") * 8;
fclose($myfile);


echo "<br>";

// PHP Read Single Line - fgets()
$file = fopen('webdictionary.txt', 'r') or die("Unable to open file...");
echo fgets($file); // AJAX = Asynchronous JavaScript and XML
fclose($file);
// Note: After a call to the fgets() function, the file pointer has moved to the next line.

echo "<br>";

// PHP Check End-Of-File - feof()
// The feof() function checks if the "end-of-file" (EOF) has been reached.
// The feof() function is useful for looping through data of unknown length.

// echo fgets($file); // Fatal error: Uncaught TypeError: fgets(): supplied resource is not a valid stream resource

$myFile = fopen("../portfolio.txt", "r") or die('Unable to open your file...');
while (!feof($myFile)) {
    echo fgets($myFile);
    // echo "Size of this line is - " . filesize("webdictionary.txt") . "<br>"; // 236
}
fclose($myFile);
/*
Name: Soham Bharti,
Emp Id: 202,
Company: SilverSky Technology,
Designation: PHP Development Trainee,
Mobile: +91 7764861777,
Home: Bihar
Total Characters:
*/

echo "<br>";

// PHP Read Single Character - fgetc()
// The fgetc() function is used to read a single character from a file.

$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while (!feof($myfile)) {
    echo fgetc($myfile);
}
fclose($myfile);
// AJAX = Asynchronous JavaScript and XML CSS = Cascading Style Sheets HTML = Hyper Text Markup Language PHP = PHP Hypertext Preprocessor SQL = Structured Query Language SVG = Scalable Vector Graphics XML = EXtensible Markup Language