<?php

// PHP str_ireplace() Function
// Replaces some characters in a string (case-insensitive)

// Syntax
// str_ireplace(find,replace,string,count)

echo str_ireplace("WORLD","Peter","Hello world!"); // Hello Peter!
echo str_ireplace("world","Peter","Hello world!"); // Hello Peter!
echo str_ireplace("woRld","Peter","Hello world!"); // Hello Peter!
echo str_ireplace("wORld","Peter","Hello world!"); // Hello Peter!
echo str_ireplace("wo","Peter","Hello world!"); // Hello Peterrld!

$arr = array("blue","red","green","yellow");
print_r(str_ireplace("RED","pink",$arr,$i)); // Case-insensitive
echo "<br>" . "Replacements: $i";