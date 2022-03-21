<?php
declare(strict_types=1);

/*
1. Apskaičiuokite PHP pagalba ir išveskite į terminalą. Kiekvienas rezultatas turi būti naujoje eilutėje:

987 + 545 - 32 * 94
32 pakelkite laipsniu 3 ir pridėkite 18
120 padalinkite iš 4 ir dar karta padalinkite iš 3
kokia liekana lieka po skaičiaus 187 dalybos iš 5
skaičiui 3 tris kartus pritaikykite increment operatorių - koki skaičių gaunate?
skaičiui 12 keturis kartus pritaikykite decrement operatorių - koki skaičių gaunate?
*/
echo 987 + 545 - 32 * 94, PHP_EOL;
echo 32**3+18, PHP_EOL;
echo 120/4/3, PHP_EOL;
echo 187%5, PHP_EOL;
$var1 = 3;
for ($i=0; $i <3 ; $i++) { 
    $var1++;
}
echo $var1, PHP_EOL;
$var2 = 12;
for ($i=0; $i<3; $i++) {
    $var2--;
}
echo $var2, PHP_EOL;




/*
2. Išspausdinkite skaičius nuo 1 iki 10 naudodamiesi ciklu. Panaudokite visus 4 būdus ciklams aprašyti.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje. 
1
2
3
...
*/
// Pirmas loop
echo PHP_EOL;
for ($i=1; $i<11; $i++) {
    echo $i, PHP_EOL;
};
echo PHP_EOL;
// Antras Loop
$counter = 0;
while ($counter <10) {
echo ++$counter, PHP_EOL;
}
echo PHP_EOL;
// Trecias loop
$counter2 = 0;
do {
echo ++$counter2, PHP_EOL;
}while($counter2<10);
echo PHP_EOL;
// Ketvirtas loop
$counterArray = [1,2,3,4,5,6,7,8,9,10];
foreach ($counterArray as $key => $value) {
    echo $value, PHP_EOL;
}

/*
3. Išspausdinkite skaičius nuo 15 iki 3 naudodamiesi ciklu. Panaudokite sau patogiausią ciklą.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje. 
*/
echo PHP_EOL;
for($i = 15; $i >2; $i--) {
    echo $i, PHP_EOL;
}
/*
4. Išspausdinkite kas antrą skaičių nuo 1 iki 20 naudodamiesi ciklu.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje.

1
3
5
...
*/
echo PHP_EOL;
echo 'increment by 2',PHP_EOL;
echo PHP_EOL;
for($i = 1; $i < 21; $i+=2) {
    echo $i, PHP_EOL;
};
/*
5. Išspausdinkite skaičius, nuo 1 iki 20, kurie dalijasi iš 3.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje. 
*/
echo PHP_EOL;
for ($i=1; $i < 21; $i++) { 
    if($i%3===0) {
        echo $i, PHP_EOL;
    }
}
/*
6. Išspausdinkite skaičius, nuo 1 iki 20, kurie dalijasi iš 3 arba iš 5.
Kiekvienas skaičius turi išspausdintas naujoje eilutėje. 
*/
echo PHP_EOL;
for ($i=1; $i < 21; $i++) {
    if($i%3===0 || $i%5===0){
        echo $i, PHP_EOL;
    }
};
/*
7. Iteruokite per skaičius, nuo 1 iki 20.
Jeigu skaičius dalijasi iš 3, išspausdinkite žodį 'Hey'.
Jeigu skaičius dalijasi iš 5, išspausdinkite žodį Ho'.
Jeigu skaičius dalijasi ir iš 5, ir iš 3, išspausdinkite žodį 'HeyHo'.
Kitu atveju išspausdinkite skaičių.
Viskas turi būti atspausdinti vienoje eilutėje su tarpais:
1 2 Hey 4 Ho Hey 7 8 Hey Ho 11 Hey 13 14 HeyHo 16 17 Hey 19 Ho
*/
echo PHP_EOL;
echo 'FizzBuzz', PHP_EOL;
for ($i=1; $i<21; $i++) { 
    echo ($i%3===0?'Fizz':'').($i%5===0?'Buzz':'')||$i;
    // if($i%3===0 && $i%5===0) {
    //     echo 'HeyHo ';
    // } elseif ($i%3===0) {
    //     echo 'Hey ';
    // } elseif ($i%5===0) {
    //     echo 'Ho ';
    // } else {
    //     echo "$i ";
    // }
};
echo PHP_EOL, PHP_EOL;
/*
8. Raskite sveikų skaičių nuo 1 iki 100 sumą.
*/
$startPoint = 1;
$numberCount = 100;
$increment = 1;
echo 'No loop ',$numberCount/2*(2*$startPoint + ($numberCount - 1)*$increment);
echo PHP_EOL;


$output = 0;
for ($i=1; $i<101; $i++) {
$output+= $i;
};
echo 'Loop ', $output, PHP_EOL;


/*
9. Pasinaudodami ciklu išspausdinkite savaitės dienas iš masyvo $days vienoje eilutėje:
monday-tuesday-wednesday-thursday-friday-saturday-sunday-
*/
echo PHP_EOL;
$days = [
    'monday',
    'tuesday',
    'wednesday',
    'thursday',
    'friday',
    'saturday',
    'sunday',
];

foreach($days as $value) {
echo "$value-";
};
echo PHP_EOL;
/*
10. Iteruokite sveikus skaičius nuo -5 iki 5.
Išspausdinkite skaičių dvejopai:
1. Pasinaudojant paprastu echo
2. Pasinaudojant funkcija var_dump ir prieš tai pavertus į 'bool' tipo reikšmę

-5
bool(true)
-4
bool(true)
...

HINT: atkreipkite dėmesį į ką pavirsta skaičius 0
*/
for($i=-5; $i<6; $i++ ) {
    echo "$i ", PHP_EOL;
    var_dump((bool) ($i));
};
echo PHP_EOL;
