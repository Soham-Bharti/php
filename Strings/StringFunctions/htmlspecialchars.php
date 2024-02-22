<?php

// PHP htmlspecialchars() Function
// Converts some predefined characters to HTML entities

$str = "This is some <b>bold</b> text.";
echo htmlspecialchars($str);

// The HTML output of the code above will be (View Source):

// <!DOCTYPE html>
// <html>
// <body>
// This is some &lt;b&gt;bold&lt;/b&gt; text.
// </body>
// </html>

// The browser output of the code above will be:
// This is some <b>bold</b> text.