<?php

// x+ -> Creates a new file for read/write. Returns FALSE and an error if file already exists

$myFile = fopen('createdFile.txt', 'x+') or die('Can not create a file');
echo fwrite($myFile, "Ye maine likh diya..."); // 21
echo "<br>";
echo "This is current ponter " . ftell($myFile); // 21
fseek($myFile, 0); // File pointer tp 0
echo "This is current ponter " . ftell($myFile); // 0
echo fread($myFile, filesize('createdFile.txt'));
echo "This is current ponter " . ftell($myFile); // 21
// echo fclose($myFile); // 1
fclose($myFile);

// Output
// 21
// Ye maine likh diya...
