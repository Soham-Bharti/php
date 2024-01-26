<?php
// Suppose the user submits interests as a newline-separated string
$userInputInterests = "Reading
Programming
Traveling
Cooking";

// Use explode() to split the string into an array based on newline characters
$interestsArray = explode("\n", $userInputInterests);

// Now $interestsArray contains individual interests
// You can iterate through the array and store or process each interest as needed
foreach ($interestsArray as $interest) {
    // Assuming you want to store each interest in a database or perform some other action
    // For demonstration purposes, let's just print each interest
    echo "Interest: $interest<br>";
}
?>
