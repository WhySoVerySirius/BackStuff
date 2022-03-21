<?php
$vardas = 'Keanu';
$pavarde = 'Reeves';
define('AMZIUS', 55);
echo ($vardas .' '. $pavarde);
echo PHP_EOL;
$pakeistasVardas = &$vardas;
$pakeistasVardas = 'Reanu';
$pakeistaPavarde = &$pavarde;
$pakeistaPavarde = 'Keeves';
$mokaAngluKalba = true;
$mokaPrancuzuKalba = false;
$mokaDaugKalbu = $mokaAngluKalba && $mokaPrancuzuKalba;
if($mokaDaugKalbu){
    echo "\n$vardas $pavarde ", AMZIUS, " Moka daug kalbu", PHP_EOL;
} else {
    echo "\n$vardas $pavarde ", AMZIUS, " Nieko nemoka", PHP_EOL; 
}


echo ("\n".$vardas .' '. $pavarde);

echo "\n$vardas $pavarde ", AMZIUS, " Ar moka daug kalbu:", PHP_EOL;

echo ($vardas .' '. $pavarde . ' ' . AMZIUS . ' ' . PHP_EOL);