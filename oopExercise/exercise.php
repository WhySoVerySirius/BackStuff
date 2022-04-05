<?php

/*
 * Exercise #1
 * Parašykite paprast clase, kuria inicijavus parodytu paprasta eileutę.
 * -- MyClass class has initialized!
 */

class MyClass
{
    public function __construct()
    {
        echo 'MyClass class has initialized!';
    }
}

$first = new MyClass();
/*
 * Exercise #2
 * Parašykite paprastą PHP klasę, kurioje būtų rodomas įvadinis pranešimas,
 * pvz., „Sveiki, aš esu {Jusu vardas}“, kur „{Jusu vardas}“ yra klasės metodo argumento reikšmė.
 */

class Greetings
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function print()
    {
        echo 'Sveiki as esu ' . $this->name;
    }
}

$second = new Greetings('John');
$second->print();
/*
 * Exercise #3
 * Parašykite PHP klasę, kuri apskaičiuoja sveikojo skaičiaus faktorialą.
 *
 * 2 -> 2
 * 3 -> 6
 * 5 -> 120
 */

class Factorial
{
    // public function __construct(int $number)
    // {
    //     $factorial = 1;
    //     while ($number !== 0)
    //     {
    //         $factorial*=$number;
    //         $number=$number-1;
    //     }
    //     echo $factorial;
    // }

    public function calculateFactorial(int $number) {
        $factorial = 1;
        while ($number !== 1)
        {
            $factorial*=$number;
            $number--;
        }
        return $factorial;
    }
}

$third = new Factorial();
echo $third->calculateFactorial(5);

/*
 * Exercise #4
 * Parašykite PHP klasę, kuri surūšiuoja paduoa sveikųjų skaičių masyvą nuo mažiausio iki didžiausio.
 * Panaudokite funkciją sort().
 *
 * $array = [3, 5, -2, 4, -1, -3, -5, 2, 1, -4];
 */

class Sorting
{
    private array $array;
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function getSortedArray():array
    {
        sort($this->array);
        return $this->array;
    }
}

$fourth = new Sorting([3, 5, -2, 4, -1, -3, -5, 2, 1, -4]);
var_dump($fourth->getSortedArray());

/*
 * Exercise #5
 * Parašykite PHP klasę, į kuria padavus 2 datetime objektus, parodytu skirtuma, tarp dviejų datų.
 *
 * DateTime("1981-11-03")
 */

class DateTimeProcessing
{
    private $date1, $date2;

    public function setFirstDate(DateTime $date): void
    {
        $this->date1 = $date;
    }

    public function setSecondDate(DateTime $date): void
    {
        $this->date2 = $date;
    }

    public function getDateDifference(): string
    {
        $dateInterval = date_diff($this->date1, $this->date2);
        return date_interval_format($dateInterval,'%a days, %H hours, %i minutes, %s seconds');
    }
}

$fifth = new DateTimeProcessing();
$fifth->setFirstDate(new DateTime("1981-11-03"));
$fifth->setSecondDate(new DateTime("1981-12-03"));
echo $fifth->getDateDifference(), PHP_EOL;
/*
 * Exercise #6
 * Parašykite PHP skaičiuoklės klasę, kuri priims dvi reikšmes kaip argumentus,
 * tada jas pridėkite, atimkite, padauginkite kartu arba padalykite.
 *
 * Pavyzdžiui :
 * $calculator = new Calculator(12, 6);
 * echo $calculator->sum(); //  18
 * echo $calculator->multiply(); // 72
 */

class Calculator
{
    private int $value1, $value2;

    public function __construct(int $value1, int $value2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
    }

    public function sum(): int
    {
        return $this->value1 + $this->value2;
    }

    public function subtract(): int
    {
        return $this->value1 - $this->value2;
    }

    public function multiply(): int
    {
        return $this->value1 * $this->value2;
    }

    public function divide(): int
    {
        return $this->value1 / $this->value2;
    }    
}

$calculator = new Calculator(12, 6);
echo $calculator->sum(), PHP_EOL; //  18
echo $calculator->multiply(), PHP_EOL; // 72
echo $calculator->divide(), PHP_EOL;
echo $calculator->subtract(), PHP_EOL;
/*
 * Exercise #8
 * Parašykite PHP klasę, įvairių geometrinių figūrų ploto apskaičiavimui.
 * Kvdrato, Stačiakampio, Skritulio, Trikampio plotas.
 */


interface GeometryFigureArea {

    public function areaSize();

    }

class Square implements GeometryFigureArea {

    private float $width;

    public function __construct(float $value)
    {
        $this->width = $value;
    }

    public function areaSize(): float
    {
        return number_format($this->width * 2, 2);
    }

}

class Triangle implements GeometryFigureArea {

    private float $width, $height;

    public function __construct(float $value1, float $value2)
    {
        $this->width = $value1;
        $this->height = $value2;
    }

    public function areaSize(): float
    {
        return number_format($this->width * $this->height / 2, 2);
    }

}

class Circle implements GeometryFigureArea {

    private float $radius;

    public function __construct(float $value)
    {
        $this->radius = $value;
    }

    public function areaSize(): float
    {
        return number_format($this->radius**2 * 3.14, 2);
    }
}

class Rectangle implements GeometryFigureArea {

    private float $height, $width;

    public function __construct(float $value1, float $value2)
    {
        $this->height = $value1;
        $this->width = $value2;
    }

    public function areaSize(): float
    {
        return number_format($this->height * $this->width, 2);
    }
}

class GeometryFigureAreaSize {

    private GeometryFigureArea $geometryFigure;

    public function __construct(string $name, float $value1, float $value2 = null)
    {
        $name === 'Circle' || $name === 'Square'
            ? $this->geometryFigure = new $name($value1)
            : $this->geometryFigure = new $name($value1, $value2);
    }

    public function returnAreaSize(): float
    {
        return $this->geometryFigure->areaSize();
    }

}

$geometryForm = new GeometryFigureAreaSize('Circle', 2.7, 10);
var_dump($geometryForm->returnAreaSize());