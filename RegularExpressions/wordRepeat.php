<?php

// ASSUMING EACH WORD ENDS WITH A NUMBER and no number is alone
$input = "a21 str1 str5"; // Hi Hi Hi Hi Hi there there you you you you ho.
$pattern = '/[A-z]*\d+[A-z]*/';

$pattern2 = '/\d+/';


if (preg_match_all($pattern, $input, $matches)) {
    $match = $matches[0];
    foreach ($match as &$x) {
        preg_match($pattern2, $x, $matchess);
        // var_dump($x);
        // echo $matchess[0];
        $strToRepeat = chop($x, '0123456789') . " "; // Hi
        $timesToPut = ltrim($x, 'A..z');
        // echo $timesToPut;
        echo preg_replace($pattern2, " " . str_repeat($strToRepeat, $timesToPut - 1) . " ", $x);
    }
    // echo $input;
} else {
    echo "I can't do it.";
}

// echo preg_replace($pattern, str_repeat('#', 1), $input);
