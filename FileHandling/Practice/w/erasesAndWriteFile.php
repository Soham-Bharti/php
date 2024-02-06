<?php

// w ->	Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file

$myFile = fopen('erasedFile.txt', 'w') or die("Could not open file");
echo fwrite($myFile, "I am text that has been replaced by previous text"); // 49
fclose($myFile);
