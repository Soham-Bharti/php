<?php

// check email validation using string function (ex. @ , .in, .com)

$email = "sohamom27@gnail.com";

$countOfAt = substr_count($email, '@');

// checking if count of @ comes to 1 and no spaces or & = _ ' - + chars should be there
if ($countOfAt == 1 && !str_contains($email, " ") && !str_contains($email, '+') && !str_contains($email, "'") && !str_contains($email, '=') && !str_contains($email, '&') && !str_contains($email, '_') && !str_contains($email, '-')) {

    // checking for last domain
    if (str_ends_with($email, '.com') || str_ends_with($email, '.in')) {

        // breakign at @ to see if the mail server is valid and there is no more .
        $posOfAt = strpos($email, '@');

        // checking if containes single . after @
        if (substr_count($email, '.', $posOfAt) == 1) {
            echo 'Valid email address';
        } else {
            echo 'More than one . count';
        }
    } else {

        echo 'Invalid domain';
    }
} else {
    if ($countOfAt < 1) {
        echo 'Atleast One @ required';
    } elseif ($countOfAt == 0) {
        echo 'No @ found';
    } else {
        echo 'Invalid email address';
    }
}
