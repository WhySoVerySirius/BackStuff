<?php
declare(strict_types=1);

// Visur sudėkite reikiamus parametrų bei return tipus

/*
1. Parašykite funkciją 'dividesBy5', kuri priimtų int tipo skaičių ir grąžintų jo dalybos iš 5 liekaną.
*/

function dividesBy5(int $input):int {
    return $input%5;
}
echo dividesBy5(48), PHP_EOL;

/*
2. Parašykite funkciją 'arrayPrinter', kuri priimtų array tipo parametrą ir
išspausdintų kiekvieną masyvo elementą naujoje eilutėje.

Funkcijos kvietimas: arrayPrinter(['some text', 'another text'])
Funkcija grąžina: funkcija nieko negrąžina - ji tik išspausdina masyvą į terminalą
'some text'
'another text'

*/
function arrayPrinter(array $arr):void {
    foreach ($arr as $key => $value) {
        echo $value, PHP_EOL;
    }
}
arrayPrinter(['asdas', 'dasfasd', 46313]);
/*
3. Parašykite funkciją 'stringEnhancer', kuri grąžintų pakeistą tekstą.

Funkcijos kvietimas: stringEnhancer('some text', '##')
Funkcija grąžina: '##some text##'

Funkcijos kvietimas: stringEnhancer('some text')
Funkcija grąžina: '**some text**'
*/
function stringEnhancer(string $string, string $enhancer = '**'):string {
        return ($enhancer . $string . $enhancer);
}
echo stringEnhancer('yeetus'), PHP_EOL;
echo stringEnhancer('yeetus', '###'), PHP_EOL;

/*
4. Parašykite funkciją 'stringModifier', kuri pakeistų paduotą string tipo kintamąjį. 

Funkcijos kvietimas: 
$x = 'some text';
stringModifier($x, '##');
echo $x; // '##some text##'

Funkcija grąžina: funkcija nieko negrąžina

*/
function stringModifier(string &$string, string $mod):void
{
    $string = $mod . $string . $mod;
}
$x = 'some text';
stringModifier($x, '##');
echo $x, PHP_EOL; // '##some text##' 
/*
4. Parašykite funkciją 'textReplicator', kuri grąžintų 'padaugintą' tekstą. 

Funkcijos kvietimas: 
textReplicator('some_text', 3);

Funkcija grąžina: 'some_text-some_text-some_text'

Funkcijos kvietimas: 
textReplicator('some_text', null);

Funkcija grąžina: 'some_text'
*/
function textReplicator(string $string, int $count = 1):string {
    if($count === null || $count <= 0) {
        return $string;
    } else {
        return str_repeat($string . '-', $count);
    }
}
echo textReplicator('yeetus', 44), PHP_EOL;
/*
4. Paverskite funkciją 'textReplicator', į veikiančią anoniminę funkciją.
*/
$textRep = function(string $string, int $count = null):string {
    if($count === null || $count <= 0) {
        return $string;
    } else {
        return str_repeat($string . '-', $count);
    }
};
echo $textRep('yeet', 4);