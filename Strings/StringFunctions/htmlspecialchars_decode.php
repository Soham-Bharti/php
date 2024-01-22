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
echo htmlspecialchars_decode($str);

// The HTML output of the code above will be (View Source):

// <!DOCTYPE html>
// <html>
// <body>
// This is some <b>bold</b> text.
// </body>
// </html>
// The browser output of the code above will be:

// This is some bold text.
