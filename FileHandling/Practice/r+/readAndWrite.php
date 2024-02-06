<?php

// r+ -> Open a file for read/write. File pointer starts at the beginning of the file

// *** For reading the text that has been newly appended we have to open the file again ***


// $myFile = fopen('demo.txt', 'r+') or die('Can not open file');
// // echo fread($myFile, filesize($myFile)); // Fatal error: Uncaught TypeError: filesize(): Argument #1 ($filename) must be of type string, resource given in
// echo fread($myFile, filesize('demo.txt')); // Hey there, I am already existing text!27
// echo fwrite($myFile, "I am written text by server");
// echo fread($myFile, filesize('demo.txt')); // Hey there, I am already existing text!27
// fclose($myFile);

// Why the added text is not displayed??


$myFile = fopen('demo.txt', 'r+') or die('Can not open file');
echo fread($myFile, filesize('demo.txt')); // Hey there, I am already existing text!27
echo "<br>";
echo fwrite($myFile, "I am written text by server"); // 27
fseek($myFile, 0);
echo "<br>";
echo fread($myFile, filesize('demo.txt')); // Hey there, I am already existing text!27
echo "<br>";
fclose($myFile);
// Output
// Hey there, I am already existing text!
// 27
// Hey there, I am already existing text!


$myFile = fopen('demo.txt', 'r+') or die('Cannot open file'); // Open file for reading
while (!feof($myFile)) {
    echo fgets($myFile) . "<br>";
}
fclose($myFile);

// Output
// Hey there, I am already existing text!I am written text by server

$file = fopen('newFile.txt', 'r+') or die("Couldn't open file");
echo fwrite($file, "Written text...") . "<br>";
fseek($file, 0);
echo fread($file, filesize('newFile.txt'));
fclose($file);

// Output
// 15
// Written text...onidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuonidfhwehoi woeuo