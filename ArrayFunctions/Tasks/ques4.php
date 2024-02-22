<?php


// Q4. Given the associative array $userActivity = ["John" => ["Login" => 5, "Logout" => 3, "Post" => 10], "Alice" => ["Login" => 8, "Logout" => 6, "Post" => 15], "Bob" => ["Login" => 7, "Logout" => 4, "Post" => 12]], find and print the user with the highest total activity (sum of login, logout, and post).


$userActivity = ["John" => ["Login" => 5, "Logout" => 3, "Post" => 10], "Alice" => ["Login" => 8, "Logout" => 6, "Post" => 15], "Bob" => ["Login" => 7, "Logout" => 4, "Post" => 12]];

// 18, 29, 23
$reqUser = '';
$highestSum = 0;
foreach ($userActivity as $key => $value) {
    $sum = 0;
    foreach ($value as $x => $y) {
        $sum += $y;
    }
    global $highestSum;
    if ($sum > $highestSum) {
        $highestSum = $sum;
        $reqUser = $key;
    }
};
echo "User with highest total activity is $reqUser and his activity is " . $highestSum . "<br>";


// Alternatively
$reqUser = '';
$highestSum = 0;
foreach ($userActivity as $key => $value) {
    $sum = array_sum(array_values($value));
    global $highestSum;
    if ($sum > $highestSum) {
        $highestSum = $sum;
        $reqUser = $key;
    }
};
echo "User with highest total activity is $reqUser and his activity is " . $highestSum . "<br>";