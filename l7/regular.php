<?php
declare(strict_types=1);

$someProducts = [
    '000_product_1  ',
    ' 000_product_2',
    '000_product_3  ',
    '000_product_4',
    '  000_product_5 ',
    '000_product_20
    ',
];

function exercise1(): array
{
    /*
    Išskaidykite $longLine kintamajį į atskirus žodžius. Žodžiai turi grįžti iš funkcijos masyvo formoje.
    Skaidykite per underscore (_)
    */
    $longLine = 'Hello_how_are_you_doing?';

    return explode('_', $longLine);
}
echo 'exercise 1', PHP_EOL, PHP_EOL;
var_dump(exercise1());
echo PHP_EOL;


function exercise2(): array
{
    /*
    Grąžinkite masyvą, kuris talpintų tik tuos žodžius, kurie panašūs į emailų adresus
    t.y. turi savyje simbolį @
    */
    $emails = [
        'some@email.com',
        'someAemail.com',
        'another@gmail.com',
        'notAreal.email.com',
        'real@gmail.com',
    ];

    return array_filter (
        $emails,
        function (string $str): ?string { 
            return str_contains($str, '@')
            ? $str
            : null;
        });
}
echo 'exercise 2', PHP_EOL, PHP_EOL;
var_dump(exercise2());
echo PHP_EOL;


function exercise3(array $products): int
{
    /*
    Suskaičiuokite ir grąžinkite visų $products masyve esančių eilučių ilgių sumą.
    Naudokite $someProducts masyvą
    */
    return array_reduce (
        $products, 
        function(?int $counter, string $string): int {
            $counter += strlen($string);
            return $counter;
    });
}
echo 'exercise 3', PHP_EOL, PHP_EOL;
var_dump(exercise3($someProducts));
echo PHP_EOL;


function exercise4(array $products): int
{
    /*
    Suskaičiuokite ir grąžinkite visų $products masyve esančių eilučių ilgių sumą, BET
    į sumą neįtraukite tuščių simbolių - ty. tarpų, new line ir pan.
    Naudokite $someProducts masyvą.
    */
    return array_reduce (
        $products,
        function (?int $counter, string $string): int{
            $counter += strlen(trim($string));
            return $counter;
    });
}
echo 'exercise 4', PHP_EOL, PHP_EOL;
var_dump(exercise4($someProducts));
echo PHP_EOL;


function exercise5(): int
{
    $text = 'The African philosophy of Ubuntu has its roots in the Nguni word for being human.
    The concept emphasises the significance of our community and shared humanity and teaches
    us that "A person is a person through others". Many view the philosphy as a counterweight
    to the culture of individualism in our contemporary world.';

    /*
    Suskaičiuokite kiek balsių yra tekste
    */
    $vowels = '/[aeiyou]/';
    return preg_match_all($vowels,$text);
}
echo 'exercise 5', PHP_EOL, PHP_EOL;
var_dump(exercise5());
echo PHP_EOL;
