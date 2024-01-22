<?php

// PHP nl2br() Function
// Inserts HTML line breaks in front of each newline in a string

// Syntax
// nl2br(string,xhtml)

echo ("One line.\nAnother line.\n") . "<br>"; // One line. Another line.
echo nl2br("One line.\nAnother line.\n");
// One line.
// Another line.

echo nl2br("One line.\nAnother line.", false);
// One line.
// Another line.

