<?php

// PHP htmlentities() Function
// Converts characters to HTML entities

// Syntax
// htmlentities(string,flags,character-set,double_encode)

$str = '<a href="https://www.w3schools.com">Go to w3schools.com</a>';
echo htmlentities($str);
// The HTML output of the code above will be (View Source):
// &lt;a href=&quot;https://www.w3schools.com&quot;&gt;Go to w3schools.com&lt;/a&gt;

// The browser output of the code above will be:
// <a href="https://www.w3schools.com">Go to w3schools.com</a>

$str = "Albert Einstein said: 'E=MC²'";
echo htmlentities($str, ENT_COMPAT); // Will only convert double quotes
echo "<br>";
echo htmlentities($str, ENT_QUOTES); // Converts double and single quotes
echo "<br>";
echo htmlentities($str, ENT_NOQUOTES); // Does not convert any quotes

// The HTML output of the code above will be (View Source):

// Albert Einstein said: 'E=MC&sup2;'<br>
// Albert Einstein said: &#039;E=MC&sup2;&#039;<br>
// Albert Einstein said: 'E=MC&sup2;'
// The browser output of the code above will be:

// Albert Einstein said: 'E=MC²'
// Albert Einstein said: 'E=MC²'
// Albert Einstein said: 'E=MC²'