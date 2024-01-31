<?php

// Metacharacters
// Metacharacters are characters with a special meaning:

/*

|	Find a match for any one of the patterns separated by | as in: cat|dog|fish
.	Find just one instance of any character
^	Finds a match as the beginning of a string as in: ^Hello
$	Finds a match at the end of the string as in: World$
\d	Find a digit
\s	Find a whitespace character
\b	Find a match at the beginning of a word like this: \bWORD, or at the end of a word like this: WORD\b
\uxxxx	Find the Unicode character specified by the hexadecimal number xxxx

*/


// Alternation (|):
$pattern = '/cat|dog|fish/';
$input = 'I love my cat. Also dog';
if (preg_match($pattern, $input, $matches)) { // Match found: cat
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}

echo preg_match($pattern, $input) . "<br>"; // 1
echo preg_match_all($pattern, $input) . "<br>"; // 2



// Dot (.):
$pattern = '/c.t/';
$input = 'cat';
if (preg_match($pattern, $input, $matches)) { //  Match found: cat
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}

$pattern = '/c..t/';
$input = 'cat';
if (preg_match($pattern, $input, $matches)) { //  No match found
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.' . "<br>";
}



// Caret (^): Finds a match as the beginning of a string as in: 
$pattern = '/^Hello/';
$input = 'Hello, world!';
if (preg_match($pattern, $input, $matches)) { // Match found: Hello
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}


// Dollar ($): Finds a match at the end of the string as in: World$
$pattern = '/World$/';
$input = 'Hello, World';
if (preg_match($pattern, $input, $matches)) { // Match found: World
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No match found.';
}


// \d (Digit): Find a digit
$pattern = '/\d/';
$input = 'The price is $25';
if (preg_match($pattern, $input, $matches)) { // Match found: 2
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No digit found.';
}


// \s (Whitespace): Find a whitespace character
$pattern = '/\s/';
$input = 'Hello World';
if (preg_match($pattern, $input, $matches)) { // Match found:
    echo 'Match found: ' . $matches[0] . "<br>";
} else {
    echo 'No whitespace found.';
}


// \b (Word Boundary): 	Find a match at the beginning of a word like this: \bWORD, or at the end of a word like this: WORD\b
$pattern = '/\bWORD\b/';
$input = 'This is a WORD example.';
if (preg_match($pattern, $input, $matches)) { // Match found: WORD
    echo 'Match found: ' . $matches[0];
} else {
    echo 'No word boundary match found.';
}


// \uxxxx (Unicode): Find the Unicode character specified by the hexadecimal number xxxx
// $pattern = '/\u{1F602}/u';  // Unicode for 😂
// $input = 'I am laughing 😂';
// if (preg_match($pattern, $input, $matches)) { // No Unicode match found.
//     echo 'Match found: ' . $matches[0];
// } else {
//     echo 'No Unicode match found.';
// }
// reg_match(): Compilation failed: PCRE2 does not support \F, \L, \l, \N{name}, \U, or \u 