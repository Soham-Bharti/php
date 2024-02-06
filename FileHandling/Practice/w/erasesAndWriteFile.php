<?php

// w ->	Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file

$myFile = fopen('erasedFile.txt', 'w') or die("Could not open file");
echo ftell($myFile) . "<br>"; // 0
echo fwrite($myFile, "I am text that has been replaced by previous text") . "<br>"; // 49
echo ftell($myFile) . "<br>"; // 49
fseek($myFile, 0);
echo ftell($myFile) . "<br>"; // 0
echo fwrite($myFile, "Hello") . "<br>"; // 5
echo ftell($myFile) . "<br>"; // 5
echo fwrite($myFile, "Worldyyy"). "<br>"; // 8
echo ftell($myFile) . "<br>"; // 13
fclose($myFile);

/* 
Output:

****
I am text that has been replaced by previous text
Hellotext that has been replaced by previous text
HelloWorldyyyt has been replaced by previous text

*/
