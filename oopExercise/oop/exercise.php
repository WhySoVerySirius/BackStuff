<?php

// Class Cart {

//     private array $cartItems=[], $cartDiscount=[];
//     private Customer $customer;
//     private string $total;

//     public function __construct(Customer $customer)
//     {
//         $this->customer = $customer;
//     }

//     public function addItem(CartItem $cartItem): void
//     {
//         array_push($this->cartItems, $cartItem);
//     }

//     public function addDiscount(CartDiscount $cartDiscount): void
//     {
//         array_push($this->cartDiscount, $cartDiscount);
//     }

//     private function getDiscount ()
//     {
//         return array_filter($this->cartDiscount, function (CartDiscount $cartDiscount)
//         {
//             return $cartDiscount->getCustomerLevel() === $this->customer->getLevel();
//         });
//     }

//     public function getTotal(): string
//     {
//         $this->total = number_format(array_reduce($this->cartItems, function (?float $counter, CartItem $item)
//         {
//             return $counter += $item->getPrice() * ( 100 - $this->getDiscount()[0]->getDiscountPercent() ) /100;
//         }));
//         return $this->total;
//     }
// }

// class CartDiscount {
//     private float $percent;
//     private string $customerLevel;

//     public function __construct(float $percent, string $customerLevel) 
//     {
//         $this->percent = $percent;
//         $this->customerLevel = $customerLevel;
//     }

//     public function getDiscountPercent(): float
//     {
//         return $this->percent;
//     }

//     public function getCustomerLevel(): string
//     {
//         return $this->customerLevel;
//     }
// }

// class CartItem {
//     private string $name;
//     private float $price;

//     public function __construct(string $name, float $price)
//     {
//         $this->name = $name;
//         $this->price = $price;
//     }

//     public function getName(): string
//     {
//         return $this->name;
//     }

//     public function getPrice(): float
//     {
//         return $this->price;
//     }
// }

// class Customer {
//     private string $name, $surname, $level;

//     public function __construct(string $name, string $surname, string $level)
//     {
//         $this->name = $name;
//         $this->surname = $surname;
//         $this->level = $level;
//     }

//     public function getFullName(): string 
//     {
//         return $this->name . ' ' . $this->surname;
//     }

//     public function getLevel() : string
//     {
//         return $this->level;
//     }
// }

// $customer = new Customer('John', 'Smith', 'A');
// $cart = new Cart($customer);

// $iphone = new CartItem('Iphone 13', 1300);
// $airpods = new CartItem('Airpods Pro', 200);
// $cart->addItem($iphone);
// $cart->addItem($airpods);

// $cartDiscount1 = new CartDiscount(15, 'A');
// $cart->addDiscount($cartDiscount1);
// $cartDiscount2 = new CartDiscount(2, 'B');
// $cart->addDiscount($cartDiscount2);
// $cartDiscount3 = new CartDiscount(20, 'C');
// $cart->addDiscount($cartDiscount3);

// var_dump($total = $cart->getTotal());


/*
    Exercise #1
    Sukurkite klasių hierarchiją. Cart, CartItem, CartDiscount, Customer.

    Cart:
    metodai:
    __construct(Customer $customer)
    addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve, klasės Cart viduje
    addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus
    getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis. Suapvalinkite iki 2 skaičių po kablelio
    Skaičiuojant total nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos, kurių customerLevel sutampa su krepšelio
    kliento leveliu,


    CartDiscount
    metodai:
    __construct(int $percent, string $userLevel)
    getDiscountPercent() - nuolaidos procentas pvz.: 15
    getCustomerLevel() - gali būti 'A', 'B' arba 'C'

    CartItem
    metodai:
    __construct(string $name, int $price)
    getName() - prekės pavadinimas pvz.: 'Iphone 13'
    getPrice() - prekė kaina pvz.: 1300 (naudokite int)

    Customer
    metodai:
    __construct(string $name, string $surname, string $level)
    getFullName()
    getLevel() - gali būti 'A', 'B' arba 'C'

    Kaip turėtų būti kviečiamas kodas:
    <?php
    $customer = new Customer('John', 'Smith', 'A');
    $cart = new Cart($customer);

    $iphone = new CartItem('Iphone 13', 1300);
    $airpods = new CartItem('Airpods Pro', 200);
    $cart->addItem($iphone);
    $cart->addItem($airpods);

    $cartDiscount1 = new CartDiscount(15, 'A');
    $cart->addDiscount($cartDiscount1);
    $cartDiscount2 = new CartDiscount(2, 'A');
    $cart->addDiscount($cartDiscount2);
    $cartDiscount3 = new CartDiscount(20, 'B');
    $cart->addDiscount($cartDiscount2);

    $total = $cart->getTotal();
    var_dump($total); // 1249.5
 */

// class Car {
//     public string $name, $color;
//     public DateTime $year;
//     public int $power;

//     public function __construct(string $name, string $color, DateTime $year, int $power)
//     {
//         $this->name = $name;
//         $this->color = $color;
//         $this->year = $year;
//         $this->power = $power;
//     }

//     public function getData()
//     {
//         return [$this->name, $this->color, date_format($this->year, 'Y-M-d'), $this->power];
//     }
// }

// class FileProcessing {
//     private Car $objectToProcess;
//     private Processor $processorToUse;

//     public function __construct(Car $objectToProcess, Processor $processorToUse)
//     {
//         $this->objectToProcess = $objectToProcess;
//         $this->processorToUse = $processorToUse;
//         $this->writeToFile();
//     }

//     public function writeToFile(): void
//     {
//         $file = fopen('file.txt', 'a');
//         fwrite($file, $this->processorToUse->convert($this->objectToProcess->getData()).PHP_EOL);
//         fclose($file);
//     }
// }

// interface Processor {

//     public function convert($objectToProcess);

// }

// class JsonConverter implements Processor{

//     public function convert($objectToProcess)
//     {
//         return json_encode($objectToProcess);
//     }
// }

// class CsvConverter implements Processor {

//     public function convert($objectToProcess)
//     {
//         return implode(',', $objectToProcess);
//     }
// }

// $status = new FileProcessing(new Car('Skoda','Red', new DateTime('2018-10-25'),120), new CsvConverter);
/*
 * Exercise #2
 *
 * Sukurti programa, kuri moketu paduotą objektą Car konvertuoti į json, csv ir išsaugoti į failą.
 *
 * class Car
 * properties:
 * - string $name
 * - DateTime $year
 * - string $color
 * - int $power
 *
 * metodai:
 * - __construct(* all properties *)
 * - getData
 *
 * JsonConverter, CsvConverter, FileProcessing
 *
 * $status = new FileProcessing(new Car, new JsonConverter);
 */

class Car {

    private string $plateNumber;

    public function __construct(string $plateNumber)
    {
        $this->plateNumber = $plateNumber;
    }

    public function getPlateNumber(): string
    {
        return $this->plateNumber;
    }
}

class Parking 
{
    const FILE = 'parking.txt';

    public function park_car(Car $car): void
    {   
        $file = fopen(self::FILE, 'a');
        fwrite($file,$car->getPlateNumber() . PHP_EOL);
        fclose($file);
        echo $car->getPlateNumber() . ' ' . 'Car parked.' . PHP_EOL;
    }

    public static function list_cars(): void
    {
        $file = fopen(self::FILE, 'r');
        echo 'Parked cars:'. PHP_EOL;
        while(!feof($file)){
           echo fgets($file);
        }
    }
}
foreach($argv as $key =>$value)
{
    if ($value === 'park_car') {
       ( new Parking())->park_car(new Car($argv[$key+1]));
    } 
    if ($value === 'list_cars') {
        ( new Parking())->list_cars();
     }
}
// new Parking($argv[1],new Car($argv[2]));
// new Car($value[$key++]))
/*
 * Exercise #3
 * Sukurkite programą skirtą valdyti parkingą. Naudokite objektinį programavimą t.y. klases.
 * Turbūt pakaks dviejų klasių - Parking ir Car. Duomenys turi būti saugomi faile.
 * ---------------------------------------------
 * php -f parking.php park_car NKA_123
 * Car ABC_123 parked!
 * ---------------------------------------------
 * php -f parking.php park_car FTA_122
 * Car FTA_122 parked!
 * ---------------------------------------------
 * php -f parking.php list_cars
 * Parked cars:
 * NKA_123
 * FTA_122
 *
 */
