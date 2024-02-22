<?php

// 3. find the first index where string is different
// ex : "football" and "footboll" => answer : index is 5

$str1 = 'football';
$str2 = 'footboll';

echo strspn($str1, $str2);

echo "<br>";

$index = 0;
for ($i = 0; $i < strlen($str1); $i++) {
    if ($str1[$i] == $str2[$i]) $index++;
    else break;
}
echo $index;
