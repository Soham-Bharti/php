<?php

// PHP strrchr() Function
// The strrchr() function finds the position of the last occurrence of a string within another string, and returns all characters from this position to the end of the string.

// Note: This function is binary-safe.

// Syntax
// strrchr(string,char)

echo strrchr("Hello world! What a beautiful day!", "What") . "<br>"; // What a beautiful day!

echo strrchr("How are you? I asked him how he was.", "How") . "<br>"; // How are you? I asked him how he was.

echo strrchr("How are you? I asked him how he was.", "how") . "<br>"; // he was.
