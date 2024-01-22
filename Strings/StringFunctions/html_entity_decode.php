<?php

// PHP html_entity_decode() Function
// Converts HTML entities to characters

// Syntax
// html_entity_decode(string,flags,character-set)

// The html_entity_decode() function is the opposite of htmlentities().

$str = '&lt;a href=&quot;https://www.google.com&quot;&gt;google.com&lt;/a&gt;';
echo html_entity_decode($str) . "<br>";  // google.com (link)

echo html_entity_decode('<h1>Hi Soham</h1>'); // Hi Soham (in H1 format)
