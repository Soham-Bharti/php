<?php

// 2) make txt file with abcd...xyz, 
// in second program get the file and remove vowels,
// print the new data without vowels   


$myFile = fopen('abcd.txt', 'a+') or die();
fwrite($myFile, 'abcdefghijklmnopqrstuvwxyz');
fclose($myFile);

$vowels = array('a', 'e', 'i', 'o', 'u');

$myFile = fopen('abcd.txt', 'r+') or die();
while (!feof($myFile)) {
    $char = fgetc($myFile);
    if (!in_array($char, $vowels)) {
        $file = fopen('consonants.txt', 'a+') or die();
        fwrite($file, $char);
        fclose($file);
    }
}
fclose($myFile);

echo "abcd...xyz written in abcd.txt";
