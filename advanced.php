<?php
declare(strict_types=1);

function exercise1(): array
{
    $products = [
        'item_1' => 'desk',
        'item_2' => 'lamp',
        'item_3' => 'error',
        'item_4' => 'sofa',
        'item_5' => 'error',
    ];

    /*
    Sunaikinkitę visus elementus, kurių reikšmė yra 'error' ir grąžinkite pamodifikuotą masyvą.
    Tikėkitės, kad $products masyvas gali turėti ne 5, 100 elementų - naudokite ciklą.
    */

    return array_filter($products, function($arg){return $arg<>'error';});
}
echo 'exercise 1'. PHP_EOL;
var_dump(exercise1());

function exercise2(int $keyPart):?array
{
    $products = [
        'product_1' => 'desk',
        'product_2' => 'lamp',
        'product_3' => 'sofa',
    ];

    /*
    Sunaikinkitę reikšmę, kuri atitiktų raktą 'product_' + $keyPart ir grąžinkite pamodifikuotą masyvą.
    Jeigu tokio rakto nėra, gražinkite null. Pridėkite trūkstamą return tipą.
    Funkcijos kvietimas: exercise2(1)
    */
    if(array_key_exists('product_'.$keyPart, $products)){
        unset($products['product_'.$keyPart]);
        return $products;
    }else{
        return null;
    }
}

echo 'exercise 2', PHP_EOL;
var_dump(exercise2(6));
var_dump(exercise2(2));


function exercise3(): array
{
    $transactions = [
        [
            'total' => 200,
            'status' => 'error',
        ],
        [
            'total' => 150,
            'status' => 'completed',
        ],
    ];

    /*
    Sunaikinkitę visus elementus, kurių reikšmė yra 'error' ir grąžinkite pamodifikuotą masyvą.
    Tikėkitės, kad $products masyvas gali turėti ne 5, 100 elementų - naudokite ciklą.
    */

    return array_filter($transactions, function($arg){return $arg['status']<>'error';});
}
echo 'exercise 3 ', PHP_EOL;
var_dump(exercise3());

function exercise4(string $key): string
{
    $products = [
        'product_1' => 'shirt',
        'product_2' => 'trousers',
        'product_98' => 'coat',
    ];
    /*
    Funkcija turi grąžinti reikšmę pagal paduota raktą.
    Jeigu paduotas raktas neegzistuoja $products masyve, gražinkite tekstą 'Item not found'.
    Funkcijos kvietimas: exercise4('product_2')
    */

    return $products[$key] ? $products[$key]: 'Item not found';
}
echo 'exercise 4', PHP_EOL;
var_dump(exercise4('product_2'));

function exercise5(): array
{
    $transactions = [
        [
            'count' => 2,
            'price' => 13,
        ],
        [
            'count' => 15,
            'price' => 14,
        ],
    ];
    /*
    Kiekvienai iš transakcijų, esančių kintamajame $transactions, suskaičiuokite galutinę sumą ir pridėkite į
    transakciją su raktu 'total'. Grąžinkite $transactions iš funkcijos.
    Tikėkitės, kad transakciju skaičius gali išaugti. Jų gali būti ne 2, o 100. Dėl to naudokite ciklą.

    Laukiamas rezultatas:
    [
        [
            'count' => 2,
            'price' => 13,
            'total' => 26,
        ],
        ...
    ];
    */
    return array_map(function(array $arg){return $arg+=['total' => $arg['count']*$arg['price']];},$transactions);
}
echo 'exercise 5', PHP_EOL;
var_dump(exercise5());

function exercise6(): array
{
    $currencyRates = [
        'usd' => 1.13,
        'gbp' => 0.83,
    ];

    $transactions = [
        [
            'count' => 2,
            'price' => 3.55
        ],
        [
            'count' => 15,
            'price' => 14.1
        ],
    ];
    /*
    Kiekvienai iš transakcijų, esančių kintamajame $transactions, suskaičiuokite galutinę sumą visomis valiutomis
    esančiomis kintamajame $currencyRates (taip pat ir bazine valiuta - eur) ir pridėkite į transakciją su raktu 'totals'.
    Apvalinkite dviejų skaitmenų po kablelio tikslumu.
    Grąžinkite pamodifikuotą $transactions masyvą iš funkcijos. 
    Tikėkitės, kad transakciju skaičius gali išaugti. Jų gali būti ne 2, o 100. Dėl to naudokite ciklą.
    Valiutų skaičius taip pat gali augti.

    Laukiamas rezultatas:
    [
        [
            'count' => 2,
            'price' => 3.55,
            'totals' => [
                'eur' => ...,
                'usd' => ...,
                'gbp' => ...,
            ],
        ],
        ...
    ];
    */
    function createPriceArray(array $arr, array $rate):array {
        $price = $arr['price']*$arr['count'];
        return [
            'eur'=> number_format($price,2),
            'usd'=> number_format( $price * $rate['usd'],2),
            'gbp'=>number_format($price * $rate['gbp'],2),
        ];
    }
    return array_map(fn(array $arr):array=>$arr+=['totals'=>createPriceArray($arr, $currencyRates)],$transactions);
}
echo 'exercise 6', PHP_EOL;
var_dump(exercise6());
$productCollection = [
    [
        'name' => 'Best sofa',
        'price' => 55,
    ],[
        'name' => 'worst sofa',
        'price' => 55,
    ],[
        'name' => 'medium sofa',
        'price' => 55,
    ],
];
function exercise7(array $collection): array
{
    /*
    Funkcijai paduodama produktų kolekcija:
    $productCollection = [
        [
            'name' => 'Best sofa',
            'price' => '55,
        ],
        ...
    ];
    exercise7($productCollection);

    Funkcija turi grąžinti performuota kolekciją - 'name' turi tapti kolekcijos elemento raktu:
    [
        'Best sofa' => [
            'price' => '55,
        ],
        ...
    ]
    */
    $arrToReturn =[];
    foreach($collection as $arr){
        $arrToReturn+=[$arr['name']=>['price'=>$arr['price']]];
    }
    return $arrToReturn;
    // return array_map(function(array $arr):array{
    //     return [$arr['name']=>['price'=>$arr['price']]];
    // }, $collection);
}
echo PHP_EOL, 'exercise 7', PHP_EOL;
var_dump(exercise7($productCollection));
function exercise8(): array
{
    $products = [
        'desk',
        'lamp',
        'sofa',
        'error',
    ];

    /*
    Išskaidykite produktų pavadinimus į raides.
    [
        'desk' => [
            'd',
            'e',
            's',
            'k',
        ],
        ...
    ]
    */

    return array_map(function(string $str):array{ return [$str=>str_split($str)];}, $products);
}
echo 'exercise 8 ', PHP_EOL;
var_dump(exercise8());

function exercise9(): void
{
    $animals = [
        [
            'type' => 'water',
            'name' => 'shark',
        ],
        [
            'type' => 'land',
            'name' => 'chimp',
        ],
        [
            'type' => 'water',
            'name' => 'hippo',
        ],
        [
            'type' => 'water',
            'name' => 'crocodile',
        ],
        [
            'type' => 'land',
            'name' => 'cat',
        ],
        [
            'type' => 'land',
            'name' => 'dog',
        ],
    ];

    /*
    Išspausdinkite gyvūnus sugrupuotus pagal tipą.

    Rezultatas:
    land: chimp dog cat
    water: shark hippo crocodile
    */
    $land= 'land:';
    $water = 'water: ';
    foreach($animals as $value) {
        if ($value['type']==='land'){
            $land.=' '.$value['name'];
        } else {
            $water.=' '.$value['name'];
        }
    };
    echo $land,PHP_EOL,$water, PHP_EOL;

}
echo 'exercise 9', PHP_EOL;
exercise9();

function getProducts(): array
{
    return [
        'chair' => [
            'type' => 'furniture',
            'name' => 'Best chair',
            'price' => 15,
        ],
        'lamp' => [
            'type' => 'lighting',
            'name' => 'Ultimate lamp',
            'price' => 99,
        ],
        'sofa' => [
            'type' => 'furniture',
            'name' => 'Soft sofa',
            'price' => 350
        ],
    ];
}
function exercise10(): array
{
    $products = getProducts();
    /*
    Į masyvą $products pridėkite naują narį ir grąžinkite naujajį masyvą. Nario 'key' - 'fridge'. Nario reikšmė:
    [
        'type' => 'appliance',
        'name' => 'Coolest fridge',
        'price' => 200,
        ]
    */
    $products['fridge']=['type' => 'appliance',
    'name' => 'Coolest fridge',
    'price' => 200,];
    return $products;
}

echo 'exercise 10', PHP_EOL;
var_dump(exercise10());

function exercise11(): int
{
    $products = getProducts();
    /*
    Raskite ir grąžinkite visų produktų kainų vidurkį
    */
    $sum = 0;
    foreach($products as $value){
        $sum+=$value['price'];
    }
    return intval($sum/count($products));
}
echo 'exercise 11', PHP_EOL;
var_dump(exercise11());

function exercise12(): array
{
    $products = getProducts();
    /*
    Sudėkite visų produktų pavadinimus į masyvą ir jį grąžinkite
    */
    $newProducts = [
        'Best chair',
        'Ultimate lamp',
        'Soft sofa',
    ];
    foreach($newProducts as $key){
        $products[$key] = [];
    }
    array_map(function(string $arr):void{$products[$arr]=[];}, $newProducts);
    return $products;
}
echo 'exercise 12', PHP_EOL;
var_dump(exercise12());

function exercise13(): void
{
    $products = getProducts();
    /*
    Iteruodami per masyvą išspausdinkite eilutę, kurioje matytusi produkto pavadinimas ir tipas atskirti brūkšneliu:
    Best chair - furniture, Ultimate lamp - lighting, Soft sofa - furniture
    */
    foreach($products as $key=>$value){
        echo $key.' - '.$value['type'].', ';
    }
}
echo 'exercise 13', PHP_EOL;
exercise13();
echo PHP_EOL;