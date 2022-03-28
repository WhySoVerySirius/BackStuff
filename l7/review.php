<?php
declare(strict_types=1);

function exercise1(): int
{
    /*
    Grąžinkite masyvo narių sumą, pakeltą kvadratu
    */
    $numbers = [1, 15, 25, 13, 45, 551, 2];

    return array_sum($numbers)**2;
}
echo PHP_EOL,'exercise 1', PHP_EOL;
var_dump(exercise1());


function exercise2(array $arr): array
{
    /*
    Kiekvieną masyvo narį padauginkite iš 15

    Funkcijos outputas:
    [15, 225, 375, ...]
    */

    return array_map(function(int $value):int{return $value*15;},$arr);
}
echo PHP_EOL,'exercise 2', PHP_EOL;
var_dump(exercise2([1, 15, 25, 13, 45, 551, 2]));


function exercise3(array $arr, string $orderDirection):array
{
    /*
    Išmeskite iš masyvo neigiamus skaičius ir juos išrikiuokite didėjimo arba mažėjimo tvarka
    priklausomai nuo $orderDirection reikšmės (ascending arba descending)

    Funkcijos kvietimas: exercise3('descending')
    Funkcijos outputas:
    [15, 3, 1, 0]

    Funkcijos kvietimas: exercise3('ascending')
    Funkcijos outputas:
    [0, 1, 3, 15]
    */

    $orderDirection==='ascending' ? asort($arr) : arsort($arr);
    return $arr;
}
echo PHP_EOL,'exercise 3', PHP_EOL;
var_dump(exercise3([1, 15, 25, 13, 45, 551, 2], 'ascending'));


function exercise4(): array
{
    /*
    Kiekvienam žodžiui apskaičiuokite balsių skaičių (a, e, i, o, u)
    Funkcijos kvietimas: exercise4()
    Funkcija grąžina: [2, 3, 3, 1, 2]
    */

    $words = [
        'tennis',
        'rooftops',
        'hillside',
        'warm',
        'friends',
    ];
    $regEx = '/[aeiou]/';
    return array_map ( function(string $str) use ($regEx) : int { return preg_match_all ( $regEx, $str ) ; }, $words);
}
echo PHP_EOL,'exercise 4', PHP_EOL;
var_dump(exercise4());


function exercise5(int $number): int
{
    /*
    Prie kiekvieno masyvo nario pridėkite skaičių $number ir grąžinkite visų masyvo narių sumą.
    Funkcijos kvietimas: exercise5(9)
    Funkcija grąžina: 715
    
    */
    $numbers = [1, 15, 25, 13, 45, 551, 2];

    return array_sum(array_map(function(int $value)use($number):int{return$value+$number;},$numbers));
}

echo PHP_EOL,'exercise 5', PHP_EOL;
var_dump(exercise5(9));

function exercise6(int $number): void
{
    /*
    Išspausdinkite skaičius, kurie prasideda nuo $number ir mažėja arba didėja iki 0, per du skaitmenis.

    Funkcijos kvietimas: exercise6(5)
    Funkcija spausdina:
    5
    3
    1
    0

    Funkcijos kvietimas: exercise6(-5)
    Funkcija spausdina:
    -5
    -3
    -1
    0
    */
    if($number !=0 and $number != 1 and $number > 0) {
        echo $number.', ';
        exercise6($number-2);
    };
    if ($number !=0 and $number != -1 and $number < 0) {
        echo $number.', ';
        exercise6($number+2);
    };
    if (abs($number)===1){
       echo $number>0? '1, 0':'-1, 0';
    };
    if($number === 0){
        echo '0';
    }
}

echo PHP_EOL,'exercise 6', PHP_EOL;
exercise6(50);

function exercise7(array $numbers): array
{
    /*
    Apskaičiuokite skaičių masyvo statistiką.
    Jeigu tarp paduotų skaičių yra neigiamų skaičių arba 0, juos ignoruokite.

    Funkcijos kvietimas: exercise7([1, 3, 40])
    Funkcija grąžina:
    [
        'suma' => 44,
        'sandauga' => 120,
        'vidurkis' => 14.66,
        'maksimumas' => 40,
        'minimumas' => 1,
        'skirtumas_max_min' => 39
    ]
    */
    return [
        'suma'=> array_sum(
            array_filter(
                $numbers,
                function(int $number): bool{
                    return $number>0
                    ? true
                    : false;
                }
                )),
        'sandauga'=> array_reduce(
            $numbers, 
            function (?int $count = 1, int $number): int{
                $count *= $number;
                return $count;
            }),
        'vidurkis'=> number_format(array_sum(
            array_filter(
                $numbers,
                function(int $number): bool{
                    return $number>0
                    ? true
                    : false;
                }
                )) / count($numbers),2),
        'maksimumas' => max($numbers),
        'minimumas' => min($numbers),
        'skirtumas_max_min' => max($numbers) - min($numbers),
    ];
}

echo PHP_EOL,'exercise 7', PHP_EOL;
var_dump(exercise7([1, 3, 40]));

function exercise8($height, $width)
{
    /*
    Parašykite funkciją, kuri išspausdintų nurodytų matmenų bloką.
    Taip pat, pataisykite funkcijos parametrus ir return tipą.

    Funkcijos kvietimas: exercise8(3, 4)
    Funkcija grąžina: funkcija nieko negrąžina, ji tik spausdina:
    [][][][]
    [][][][]
    [][][][]
    */

}


function exercise9(array $items, int $partsCount = 2): array
{
    /*
    Išskaidykite masyvą į nurodytą kiekį dalių.
    Patasykite šios funkcijos 'signature' (parametrus) taip, kad būtų galima ją kviesti nepaduodant
    antrojo parametro $partsCount (2 pavyzdys) ir tokiu atveju masyvas būtų dalinamas į dvi dalis.

    Funkcijos kvietimas:
    exercise9(
        [1, 2, 3, 4, 5, 6, 7],
        4
    )
    Funkcija grąžina:
    [
        [1, 2],
        [3, 4],
        [5, 6],
        [7]
    ]

    Funkcijos kvietimas: exercise9([1, 2, 3, 4, 5, 6, 7])
    Funkcija grąžina:
    [
        [1, 2, 3, 4],
        [5, 6, 7],
    ]
    */

    return [];
}
