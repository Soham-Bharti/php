<?php


// $product = [
// 	[
// 		'id' => 1,
// 		'name' => 's23'
// 		'category' => 'mobile'
// 		'price' => '30000'
// 	],
// 	[
// 		'id' => 2,
// 		'name' => 's24'
// 		'category' => 'mobile'
// 		'price' => '40000'
// 	],
// 	[
// 		'id' => 3,
// 		'name' => 'mi a32'
// 		'category' => 'television'
// 		'price' => '0400'
// 	],
// 	[
// 		'id' => 4,
// 		'name' => 'lg 102'
// 		'category' => 'refregrator'
// 		'price' => '20000'
// 	],
// 	[
// 		'id' => 4,
// 		'name' => 'samsung 42'
// 		'category' => 'television'
// 		'price' => '24000'
// 	]

// ]

// Isme category wise price ka total kro or usko sorting krke display krna he using function


$product = [
    [
        'id' => 1,
        'name' => 's23',
        'category' => 'mobile',
        'price' => '30000'
    ],
    [
        'id' => 2,
        'name' => 's24',
        'category' => 'mobile',
        'price' => '40000'
    ],
    [
        'id' => 3,
        'name' => 'mi a32',
        'category' => 'television',
        'price' => '0400'
    ],
    [
        'id' => 4,
        'name' => 'lg 102',
        'category' => 'refregrator',
        'price' => '20000'
    ],
    [
        'id' => 5,
        'name' => 'samsung 42',
        'category' => 'television',
        'price' => '24000'
    ],
    [
        'id' => 6,
        'name' => 'redmi note 9 pro',
        'category' => 'mobile',
        'price' => '14000'
    ],
    [
        'id' => 7,
        'name' => 'samsung Ultra',
        'category' => 'refregrator',
        'price' => '34000'
    ],
];


function fun($product)
{
    global $categories;
    $categories[$product['category']] = $categories[$product['category']] ?? 0;
    $categories[$product['category']] += $product['price'];
}

array_map('fun', $product);
arsort($categories);
print_r($categories);
