<?php

// Open or create a file for writing and reading (w+ mode)
$filename = 'example.txt';
$file = fopen($filename, 'w+');

// Check if the file is successfully opened
if ($file) {
    // Write content to the file
    $contentToWrite = "Hello, this is an example content.";
    fwrite($file, $contentToWrite);

    // Move the file pointer to the beginning for reading
    fseek($file, 0);

    // Read content from the file
    $contentRead = fread($file, filesize($filename));

    // Close the file
    fclose($file);

    // Display the content
    echo "Content written to file: $contentToWrite <br>";
    echo "Content read from file: $contentRead";
} else {
    echo "Error opening the file.";
}
?>


?>