<?php

// a+ -> Open a file for read/write. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist

$myFile = fopen('preserved.txt', 'a+') or die("Can't open file");
echo fwrite($myFile, 'I am the appended text') . "<br>"; // 22
fseek($myFile, 0);
echo fread($myFile, filesize('preserved.txt')); // I am the preserved text.I am the appended text
fclose($myFile);




// Dikkaatein.....

// $myFile = fopen('preserved.txt', 'a+') or die("Can't open file");
// echo fread($myFile, filesize('preserved.txt')); // I am the preserved text.
// fseek($myFile, 0);
// echo fwrite($myFile, 'I am the appended text') . "<br>"; // 22
// fseek($myFile, 0);
// echo fread($myFile, filesize('preserved.txt')); // I am the preserved text.
// fclose($myFile);
