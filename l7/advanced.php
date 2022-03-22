<?php
declare(strict_types=1);

function exercise1(string $stringToSplit, array $delimiters): array
{
    /*
    Funkcija turi priimti string'ą, kuris bus skaidomas,
    bei masyvą segmentų, pagal kuriuos bus skaidoma.
    
    Kvietimas turi atrodyti taip:
    exercise1('Hello_how_are-you doing?', [' ', '-', '_'])

    Funkcijos outputas turėtų atrodyti taip:
    ['Hello', 'how', 'are', 'you', 'doing?']
    */
    return explode(':',str_replace($delimiters,':', $stringToSplit));
}
var_dump(exercise1('Hello_how_are-you doing?', [' ', '-', '_']));

function exercise2(array $words): array
{
    /*
    Sukategorizuokite žodžius pagal jų pradžios simbolį.
    Funkcija kviečiama:
    exercise2(['hello', 'Hickup', '123', 'computer'])
    Funkcijos outputas:
    [
        'h' => ['hello', 'Hickup'],
        '1' => ['123'],
        'c' => ['computer'],
    ]
    */
        $arrayToReturn=[];
        foreach($words as $value){
            key_exists(substr(strtolower($value),0,1), $arrayToReturn)?$arrayToReturn[substr(strtolower($value),0,1)].=", $value":$arrayToReturn[substr(strtolower($value),0,1)]=$value; 
        }
    return $arrayToReturn;
}

var_dump(exercise2(['hello', 'Hickup', '123', 'computer']));

function exercise3(array $words): array
{
    /*
    Išveskite žodžių statistiką.
    Funkcija kviečiama:
    exercise2(['hello', 'you'])
    Funkcijos outputas:
    [
        'hello' => [
            'vowels' => 2,
            'consonants' => 3,
            'length' => 5,
            'starts_with' => h,
            'ends_with' => o,
        ],
        'you' => [
            'vowels' => 3,
            'consonants' => 0,
            'length' => 3,
            'starts_with' => y,
            'ends_with' => u,
        ] 
    ]
    */
            $arrayToReturn =[];
            $vowels = '/[aeiouy]/';
            foreach($words as $value){
                $arrayToReturn[$value] = [
                    'vowels'=>preg_match_all($vowels,$value),
                    'consonants'=>strlen($value)-preg_match_all($vowels,$value),
                    'length'=>strlen($value),
                    'starts_with'=>substr($value,0,1),
                    'ends_with'=>substr($value,-1,1),
                ];
            }
    return $arrayToReturn;
}
echo PHP_EOL, 'exercise 3', PHP_EOL;
var_dump(exercise3(['hello', 'you']));

function exercise4(): array
{
    /*
    Grąžinkite masyvą, kuris savyje turėtų tik tuos žodžius, kurie arba prasideda, arba baigiasi 
    simboliais a, s, b, o
    */
    $emails = [
        'some@email.com',
        'someAemail.com',
        'another@gmail.com',
        'notAreal.email.io',
        'real@gmail.com',
    ];
    $markUps = ['a', 's', 'b', 'o'];
    return array_filter($emails, function(string $value) use ($markUps):bool{return in_array(substr($value,0,1), $markUps) or in_array(substr($value,-1,1),$markUps)?true:false;});
}
var_dump(exercise4());