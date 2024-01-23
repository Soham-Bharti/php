<?php

// PHP htmlspecialchars_decode() Function
// Converts some predefined HTML entities to characters
// HTML entities that will be decoded are:

// &amp; becomes & (ampersand)
// &quot; becomes " (double quote)
// &#039; becomes ' (single quote)
// &lt; becomes < (less than)
// &gt; becomes > (greater than)

$str = "This is some &lt;b&gt;bold&lt;/b&gt; text.";
echo htmlspecialchars_decode($str) . "<br>";

// The HTML output of the code above will be (View Source):

// <!DOCTYPE html>
// <html>
// <body>
// This is some <b>bold</b> text.
// </body>
// </html>
// The browser output of the code above will be:

// This is some bold text.


$str = "This is &lt;i&gt;itallic&lt;/i&gt; text.";
echo htmlspecialchars_decode($str) . "<br>"; // This is some itallic text.

$str = "This is heading - H1 &lt;h1&gt;Laravel&lt;/h1&gt; text.";
echo htmlspecialchars_decode($str) . "<br>"; 
// This is heading - H1
// Laravel
// text.
