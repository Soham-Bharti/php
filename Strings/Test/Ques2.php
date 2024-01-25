<?php

//  find vowel of the string (ex. hello how are you) . answer is 7

$givenStr = "hello how are you";

$total = 0;

for ($i = 0; $i < strlen($givenStr); $i++) {
    if ($givenStr[$i] == 'a' || $givenStr[$i] == 'e' || $givenStr[$i] == 'o' || $givenStr[$i] == 'u') {
        $total++;
    }
}
echo "Ans is " . $total;
