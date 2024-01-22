<?php

// PHP chunk_split() Function
// Splits a string into a series of smaller parts

// Syntax 
// chunk_split(string,length,end)

$str = "Hello World!";
echo chunk_split($str, 1, '.') . "<br>"; // H.e.l.l.o. .W.o.r.l.d.!.


$str = "Hello World!";
echo chunk_split($str, 1, ' ') . "<br>"; // H e l l o W o r l d !

$str = "Hello World!";
echo chunk_split($str, 2, '@') . "<br>"; // He@ll@o @Wo@rl@d!@

$str = "Hello World";
echo chunk_split($str, 2, '@') . "<br>"; // He@ll@o @Wo@rl@d@

$name = "Soham Bharti";
echo chunk_split($name, 3, " - ") . "<br>"; // Soh - am - Bha - rti -

$name = "Soham Bhart";
echo chunk_split($name, 3, " - ") . "<br>"; // Soh - am - Bha - rt -

$name = "Soham Bhar";
echo chunk_split($name, 3, " - ") . "<br>"; // Soh - am - Bha - r -

$str = "Hello world!";
echo chunk_split($str,6,"..."); // $str = "Hello world!";
