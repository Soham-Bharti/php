<?php

// x -> Creates a new file for write only. Returns FALSE and an error if file already exists

// $myFile = fopen('create_file.txt', 'x') or die('File already exists, Failed to create create_file.txt');
// echo fwrite($myFile, "I am the text in newly created file");
// fclose('create_file.txt'); // Fatal error: Uncaught TypeError: fclose(): Argument #1 ($stream) must be of type resource, string given in
// fclose($myFile); // 35

// Output
// 35

// create_file.txt
// I am the text in newly created file

$myFile = fopen('create_file.txt', 'x') or die('File already exists, Failed to create create_file.txt');
echo fwrite($myFile, "I am the text in newly created file");
// echo fread($myFile, filesize('create_file.txt')); // Notice: fread(): Read of 8192 bytes failed with errno=9 Bad file descriptor in
fclose($myFile);