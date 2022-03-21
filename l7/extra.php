<?php

$inventory = [
    'apple' => [
        'count' => 5,
        'price' => 0.15,
    ],
    'carrot' => [
        'count' => 100,
        'price' => 0.01,
    ],
    'fish' => [
        'count' => 15,
        'price' => 5.5,
    ],
    'beer_bottle' => [
        'count' => 22,
        'price' => 1.3,
    ],
    'cheese' => [
        'count' => 1,
        'price' => 4.5,
    ],
    'wine_bottle' => [
        'count' => 4,
        'price' => 8,
    ],
    'bread' => [
        'count' => 11,
        'price' => 2.1,
    ],
];

$categories = [
    'fruits' => [
        'type' => 'category',
        'items' => [
            'apple' => [
                'count' => 5,
                'price' => 0.15,
            ],
            'pear' => [
                'count' => 5,
                'price' => 0.15,
            ],
        ],
        'categories' => [
            'exotic_fruits' => [
                'type' => 'category',
                'items' => [
                    'banana' => [
                        'count' => 15,
                        'price' => 0.3,
                    ],
                ],
            ],
        ],
    ],
    'vegetables' => [
        'type' => 'category',
        'items' => [
            'carrot' => [
                'count' => 100,
                'price' => 0.01,
            ],
            'tomato' => [
                'count' => 45,
                'price' => 0.5,
            ],
        ],
    ],
    'seafood' => [
        'type' => 'category',
        'items' => [
            'seabass' => [
                'count' => 15,
                'price' => 5.5,
            ],
        ],
    ],
    'alcohol' => [
        'type' => 'category',
        'items' => [
            'beer_bottle' => [
                'count' => 22,
                'price' => 1.3,
            ],
            'wine_bottle' => [
                'count' => 4,
                'price' => 8,
            ],
        ],
    ],
    'milk' => [
        'type' => 'category',
        'items' => [
            'cheese' => [
                'count' => 1,
                'price' => 4.5,
            ],
            'yoghurt' => [
                'count' => 13,
                'price' => 0.99,
            ],
        ],
    ],
    'bread' => [
        'type' => 'category',
        'items' => [
            'brown_bread' => [
                'count' => 11,
                'price' => 2.1,
            ],
            'white_bread' => [
                'count' => 110,
                'price' => 1.3,
            ],
        ],
    ],
];

if ($argv[1]==='get_total'){
    $total =0;
    foreach($inventory as $value){
        $total+=$value['price']*$value['count'];
    }
    echo strval(($total)), PHP_EOL;
}
else {
    $order = explode(' ',$argv[1]);
    echo PHP_EOL;
    $orderArray =[];
    foreach($order as $element){
    $explode = explode(':', $element);
    $orderArray[$explode[0]] = $explode[1];
    }
    bill();
}
function bill():void{
    global $orderArray;
    global $inventory;
    $stringToPrint ='You bought:';
    $stringToPrint2 = "";
    $total = 0;
    $state = true;
    $failString = "";
    foreach($orderArray as $key => $value){
        if(!array_key_exists($key, $inventory)){
            $state = false;
            $failString.= "Sorry we don't have $key in our inventory\r\n";
        }elseif($value > $inventory[$key]['count']){    
            $state = false;
            $failString.="You have ordered $value of $key, but we have only ".strval($inventory[$key]['count'])." of $key". PHP_EOL;
        }else{
        $stringToPrint.=" $value $key,";
        $stringToPrint2.="$key\r\n".strval($inventory[$key]['price']).' * '.strval($value).' = '.strval($inventory[$key]['price']*$value)."\r\n*****\r\n";
        $total+=$inventory[$key]['price']*$value;
        }
    }
    if($state){
        echo $stringToPrint,PHP_EOL;
        echo '*****',PHP_EOL;
        echo $stringToPrint2;
        echo 'Total: '.strval($total), PHP_EOL;
    } else {
        echo 'Error!', PHP_EOL;
        echo $failString, PHP_EOL;
    }
}



// We have a shop. This shop's inventory is an array:



// Write a program to print the receipt to a customer for some order.

// Expected input: php -f 1_1_shoping_basket.php 'apple:1 carrot:7 wine_bottle:2'
// Expected output:
// You bought: 1 apple, 7 carrot, 2 wine_bottle
// *****
// apple
// 0.15 * 1 = 0.15
// *****
// carrot
// 0.01 * 7 = 0.07
// *****
// wine_bottle
// 8 * 2 = 16
// *****
// Total: 16.22


// ****
// Extra

// 1.2 Improve your program to give feedback to the user if some items do not exist.
// Need to output only the first item which is out of stock or low inventory.
// Expected input: php -f 1_1_shoping_basket.php 'apple:10 carrot:150 wine_bottle:2'
// Expected output:
// Error!
// We only have 5 apple, you asked 10 apple

// 1.3 Improve your program to give feedback to the user if some items do not exist.
// Need to output all items that are low or do not exist.
// Expected input: php -f 1_1_shoping_basket.php 'apple:10 carrot:150 wine_bottle:10'
// Expected output:
// Error!
// We only have 5 apple, you asked 10
// We only have 100 carrot, you asked 150

// 1.4 Improve your progam to print the total cost of all items in your store

// Expected input: php -f 7_shoping_basket.php get_total
// Expected output:
// Total count: 158
// Total cost: 172.45

// 1.5 Write a new command that is capable to work with nested warehouse array, named $categories.
// It should be able to find the ordered item within 'items' array of a category.
// It should print all the output, that commands 1.1 - 1.4 are able to print.
// Assume, that categories can be at most two levels deep - like fruits->exotic_fruits



// 1.6 Improve your command to provide analytical data to a store manager


// Expected input: php -f 7_shoping_basket.php total category bread
// Expected output:
// Total count: 258
// Total cost: 173.45
