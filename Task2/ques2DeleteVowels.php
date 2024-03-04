<?php

//
$file = fopen('abcd.txt', 'w') or die();
$toWriteFile = fopen('consonants.txt', 'r') or die();
fwrite($file, fread($toWriteFile, filesize('consonants.txt')));
fclose($toWriteFile);
fclose($file);

echo "Vowels are deleted from abcd.txt";