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

// echo "Order/s with highest cost is: ";
// print_r($outputArr);
// print_r("and it's cost is $highestOrder");

echo "<br>";

// calculate the total cost of each order (Quantity \* Price), and then find the order with the highest total cost.
// Alternatively -> use array_product() and add the result(order cost) to the original array

$highestOrder = 0;

foreach ($orderDetails as $key => $value) {
    // var_dump(array_product($value)); // int(0)
    $costOfOrder = (array_product(array_slice($value, 1, 2, true)));
    $orderDetails[$key]['totalCost'] = $costOfOrder;
    if ($costOfOrder > $highestOrder) $highestOrder = $costOfOrder;
}
// echo $highestOrder . "<br>";
// print_r($orderDetails);
$outputArr = array_keys(array_filter($orderDetails, function ($orders) {
    // print_r($orders);
    if ($orders['totalCost'] == $GLOBALS['highestOrder']) {
        return key($orders);
    }
}));
echo "Order/s with highest cost is: ";
print_r($outputArr);
print_r("and it's cost is $highestOrder");
