<?php

// PHP strip_tags() Function
// The strip_tags() function strips a string from HTML, XML, and PHP tags.


// Syntax
// strip_tags(string,allow)

echo strip_tags("<h2>Hello, <b>Soham</b></h2>") . "<br>"; // Hello, Soham
echo strip_tags("<h2>Hello, <b>Soham</b></h2>", "<b>") . "<br>"; // Hello, Soham(bolded)
echo strip_tags("<h2>Hello, <b>Soham</h2>", "<b>") . "<br>"; // Hello, Soham(bolded)
