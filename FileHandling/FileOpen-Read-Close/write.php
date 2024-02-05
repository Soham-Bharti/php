<?php

// PHP Write File

/*
r	Open a file for read only. File pointer starts at the beginning of the file
w	Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a	Open a file for write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x	Creates a new file for write only. Returns FALSE and an error if file already exists
*/


// $myFile = fopen('demo.txt', 'x') or die('Can not make a file to write');
// echo fwrite($myFile, "Hello from Soham Bharti"); // 23
// fclose($myFile);


// $myFile = fopen('demo.txt', 'a') or die('Can not open file');
// echo fwrite($myFile, "\nThis is an added text"); // 21
// fclose($myFile);

// $myFile = fopen('demo.txt', 'w') or die('Can not open file');
// echo fwrite($myFile, "This is an overridden text"); // 26
// fclose($myFile);



/*
r+	Open a file for read/write. File pointer starts at the beginning of the file
w+	Open a file for read/write. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a+	Open a file for read/write. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x+	Creates a new file for read/write. Returns FALSE and an error if file already exists
*/

// $myFile = fopen('demo.txt', 'r+') or die('Can not open file');
// echo "***" . fgetc($myFile);
// echo fread($myFile, filesize('demo.txt')) . "<br>"; // Read me...
// echo fwrite($myFile, "Good morning"); // 105
// echo fgets($myFile) . "<br>"; // Used r+ (Open a file for read/write. File pointer starts at the beginning of the file) This is an r+ text
// fclose($myFile);

// $myFile = fopen('demo.txt', 'w+');
// echo fwrite($myFile, "w+ over written text") . "<br>";
// echo fread($myFile, filesize('demo.txt')) . "<br>"; // 20
// fclose($myFile);

// $myFile = fopen('demo.txt', 'a+');
// echo fread($myFile, filesize('demo.txt')) . "<br>"; // 22
// echo fwrite($myFile, "\na+ added text at last") . "<br>"; 
// fclose($myFile);


// $myFile = fopen('demo.txt', 'x+') or die('Can not recreate existing file'); // Can not recreate existing file
$myFile = fopen('soham.txt', 'x+') or die('Can not recreate existing file'); // Can not recreate existing file
echo fwrite($myFile, "This is a text on new file created using x+"); // 43
// $my2File = fopen('soham.txt', 'r');
// echo fread($my2file, filesize("soham.txt")) . "<br>"; // doubt!!!!!
fclose($myFile);
