<?php

echo "<b>Your Input</b> <br><hr>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // print_r($_POST); 
    // Array ( [uName] => Rohit Kirar [uEmail] => rohit123@gmail.com [uWebsite] => https://www.google.com [uComment] => sexy [uGender] => female )
    $name = test_input($_POST["uName"]);
    $email = test_input($_POST["uEmail"]);
    $website = test_input($_POST["uWebsite"]);
    $comment = test_input($_POST["uComment"]);
    $gender = test_input($_POST["uGender"]);
}

/*
Validate Form Data With PHP
The first thing we will do is to pass all variables through PHP's htmlspecialchars() function.

When we use the htmlspecialchars() function; then if a user tries to submit the following in a text field:

<script>location.href('http://www.hacked.com')</script>

- this would not be executed, because it would be saved as HTML escaped code, like this:

&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;

The code is now safe to be displayed on a page or inside an e-mail.

We will also do two more things when the user submits the form:

Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
The next step is to create a function that will do all the checking for us (which is much more convenient than writing the same code over and over again).
*/

function test_input($data)
{
    $data = trim($data);
    // The htmlspecialchars() function converts special characters to HTML entities. This means that it will replace HTML characters like < and > with &lt; and &gt;. This prevents attackers from exploiting the code by injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
    $data = htmlspecialchars($data);
    // Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
    $data = stripslashes($data);
    echo "$data<br>";
}
