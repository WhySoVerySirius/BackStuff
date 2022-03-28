<?php
declare(strict_types=1);

/*
1. Išspausdinkite šio momento datą pasinaudodami funkcija 'date'
*/
function exercise1(): void
{
    echo date('Y-m-d H:i:s');
}
echo PHP_EOL, 'exercise 1', PHP_EOL;
exercise1();
echo PHP_EOL;
/*
2. Išspausdinkite datą '2008-12-15 15:15' pasinaudodami funkcija 'date'
*/
function exercise2(): void
{
    echo date('Y-m-d H:i', 1229346900);
}
echo PHP_EOL, 'exercise 2', PHP_EOL;
exercise2();
echo PHP_EOL;

/*
3. Išspausdinkite šio momento datą skirtingais formatais, kurie atitiktų pavyzdžius:
- 1970 Mar 1 15:15:00
- 1970 Mar 01 15:15
- 1970 Mar 1st 11:15:00 PM
- 1970/3/1
- savaites numeris (52 savaitės metuose)
- dienos numeris (365 dienos metuose)
*/
function exercise3(): void
{
    echo date('Y M d H:i:s'), PHP_EOL;
    echo date('Y M d H:i'), PHP_EOL;
    echo date('Y M jS H:i:s A'), PHP_EOL;
    echo date('Y/n/j'), PHP_EOL;
    echo date('W'), PHP_EOL;
    echo date('z'), PHP_EOL;
}

echo PHP_EOL, 'exercise 3', PHP_EOL;
exercise3();
echo PHP_EOL;


/*
4. Sukurkite datos objektą iš šių tekstinių datų:
- 2000-03-02 15:30:00
- 2000/02/15 08:30:00 PM
- 2000 March 2nd 15:30:00
*/
function exercise4(): void
{
    $firstDate = date_create('2000-03-02 15:30:00');
    $secondDate = date_create('2000/02/15 08:30:00 PM');
    $thirdDate = date_create_from_format('Y M jS H:i:s','2000 March 2nd 15:30:00');
    echo 'first date', PHP_EOL;
    var_dump($firstDate);
    echo 'second date', PHP_EOL;
    var_dump($secondDate);
    echo 'third date', PHP_EOL;
    var_dump($thirdDate);
}

echo PHP_EOL, 'exercise 4', PHP_EOL;
exercise4();
echo PHP_EOL;

/*
5. Sukurkite datą iš '15th Jan 2021 8:15:01 PM' (data X). Pamodifikuokite, kad gautumėte:
- datą po 2 savaičių nuo datos X
- datą po 10 metų nuo datos X
- datą prieš 5 valandas nuo datos X
- paskutinę mėnesio dieną
- pirmą mėnesio dieną
- ateinantį antradienį
- datą prieš 1 dieną 8 valandas 15 minučių nuo datos X
*/

function exercise5(): void
{
    $date = date_create_from_format('dS M Y h:i:s A','15th Jan 2021 8:15:01 PM');
    echo 'in 2 weeks', PHP_EOL;
    $date2 = $date;
    var_dump(date_modify($date2, '+2 weeks'));
    echo 'in 10 years', PHP_EOL;
    $date3 = $date;
    var_dump(date_modify($date3, '+10 years'));
    echo '5 hours ago', PHP_EOL;
    $date4 = $date;
    var_dump(date_modify($date4, '-5 hours'));
    echo 'last day of the month', PHP_EOL;
    $date5 = $date;
    var_dump(date_modify($date5, '-5 hours'));
    echo 'first day of the month', PHP_EOL;
    $date6 =$date;
    var_dump(date_modify($date6, '-5 hours'));
    echo 'upcomming tuesday', PHP_EOL;
    $date7 = $date;
    var_dump(date_modify($date7, '-5 hours'));
    echo '1 day 8 hours 15 minutes ago', PHP_EOL;
    $date8 = $date;
    var_dump(date_modify($date8, '-1 day -8 hours -15 minutes'));
}

echo PHP_EOL, 'exercise 5', PHP_EOL;
exercise5();
echo PHP_EOL;

function exercise6(): void
{
    $products = [
        [
            'name' => 'Wine glass',
            'last_purchase' => '2021 Jan 15 18:34:12',
        ],
        [
            'name' => 'Bread knife',
            'last_purchase' => '2020 Mar 15 23:14:00',
        ],
        [
            'name' => 'Blue chair',
            'last_purchase' => '2019 Dec 02 15:00:12',
        ],
    ];

    /*
    Išspausdinkite produktų paskutinių pirkimų santrauką:
    Wine glass 2021-01-15 18:34:12
    ...
    */
    $format = 'Y M d H:i:s';
    array_map(function (array $arr) use ($format): void {
        echo $arr['name'].' '.date_create_from_format($format, $arr['last_purchase'])->format('Y-m-d H:i:s'), PHP_EOL;
    },$products);
}

echo PHP_EOL, 'exercise 6', PHP_EOL;
exercise6();
echo PHP_EOL;

function exercise7($date1, $date2): string
{
    /*
    Palyginkite datas ir grąžinkite atsakymą, kuri data naujesnė.

    Funkcijos kvietimas: exercise7(date_create('2022-01-25 17:13:25'), date_create('2020-01-25 17:13:25'));
    Rezultatas:
    'First date is newer'

    Funkcijos kvietimas: exercise7(date_create('2020-01-25 17:13:25'), date_create('2022-01-25 17:13:25'));
    Rezultatas:
    'Second date is newer'
    */

    return $date1>$date2
        ? 'First date is newer'
        : 'Second date is newer';
}

echo PHP_EOL, 'exercise 7', PHP_EOL;
var_dump(exercise7(date_create('2022-01-25 17:13:25'), date_create('2023-01-25 17:13:25')));
echo PHP_EOL;

function exercise8($date): void
{
    /*
    Išspausdinkite paduotos datos skirtumą nuo dabartinio momento žodžiais.

    Funkcijos kvietimas: exercise8(date_create('2020-01-25 17:13:25'));
    Rezultatas:
    Supplied date was 773 days ago

    Funkcijos kvietimas: exercise8(date_create('2023-01-25 17:13:25'));
    Rezultatas:
    Supplied date is in the future
    */
    $dateDiff = number_format(strval(time() - strtotime($date->format('Y-m-d H:i:s')))/86400);
    echo $dateDiff>0
        ?"supplied date was $dateDiff days ago"
        :"supplied date is in the future";


}

echo PHP_EOL, 'exercise 8', PHP_EOL;
exercise8(date_create('2023-01-25 17:13:25'));
echo PHP_EOL;

function exercise9($date): void
{
    /*
    Išspausdinkite datų skirtumą žodžiais.

    Funkcijos kvietimas: exercise9(date_create('2020-01-25 17:13:25'));
    Rezultatas:
    Supplied date was 2 years 1 months 11 days

    Funkcijos kvietimas: exercise9(date_create('2023-01-25 17:13:25'));
    Rezultatas:
    Supplied date is in the future
    */
    
}

echo PHP_EOL, 'exercise 9', PHP_EOL;
var_dump(exercise9(date_create('2022-01-25 17:13:25')));
echo PHP_EOL;