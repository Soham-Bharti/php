<?php

// Q5. Given the associative array $orderDetails = ["Order1" => ["Product" => "Laptop", "Quantity" => 2, "Price" => 1200], "Order2" => ["Product" => "Smartphone", "Quantity" => 3, "Price" => 800], "Order3" => ["Product" => "Tablet", "Quantity" => 1, "Price" => 500]], calculate the total cost of each order (Quantity \* Price), and then find the order with the highest total cost.

$orderDetails = ["Order1" => ["Product" => "Laptop", "Quantity" => 2, "Price" => 1200], "Order2" => ["Product" => "Smartphone", "Quantity" => 3, "Price" => 800], "Order3" => ["Product" => "Tablet", "Quantity" => 1, "Price" => 500]];

// $reqOrder = [];
// $highestOrder = 0;
// foreach ($orderDetails as $key => $value) {
//     $currCost = $value['Quantity'] * $value['Price'];
//     global $highestOrder;
//     if($currCost > $highestOrder) {
//         $highestOrder = $currCost;
//         $reqOrder = $key;
//     }

// };

// echo "Order with highest total cost is $reqOrder and his activity is " . $highestOrder;

$reqOrder = [];
$highestOrder = 0;
$arr = [];
foreach ($orderDetails as $key => $value) {
    $currCost = $value['Quantity'] * $value['Price'];
    global $highestOrder;
    if ($currCost > $highestOrder) {
        $highestOrder = $currCost;
        $reqOrder = $key;
    }
    $arr[$key] = $currCost;
};


$outputArr = (array_filter($arr, function ($order) {
    return $order == $GLOBALS['highestOrder'];
}));

echo "Order/s with highest cost is: ";
print_r($outputArr);
print_r("and it's cost is $highestOrder");

