<?php
// Read the contents of the CSV file into a string
$csvContent = file_get_contents('data.csv');

// Split the content into an array of lines
$lines = explode("\n", $csvContent);

// Process each line
foreach ($lines as $line) {
    // Split each line into an array of values using explode() and the comma as a delimiter
    $values = explode(',', $line);

    // Assuming the CSV has three columns: First Name, Last Name, Age
    $firstName = $values[0];
    $lastName = $values[1];
    $age = $values[2];

    // Output or process the data as needed
    echo "Name: $firstName $lastName, Age: $age<br>";
}
?>
