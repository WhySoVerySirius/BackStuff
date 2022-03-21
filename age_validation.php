<?php
define('MINIMUM_AGE', 18);
$jonasAge = 13;
$povilasAge = 24;
$check = function($input) {
    var_dump(MINIMUM_AGE === $input);
};
$check($jonasAge);
$check($povilasAge);


$checkIfDividesBy5 = function (int $age) {
    $birthYear = 2022 - $age;
    $yearToCheck = $birthYear - $age;
    var_dump($yearToCheck%5===0);
};
$checkIfDividesBy5(34);

$baigeMokykla = true;
$baigeUniversiteta = true;
$baigeKursus = true;
$galiDirbtiProgramuotoju = $baigeMokykla and ($baigeUniversiteta or $baigeKursus);
var_dump($galiDirbtiProgramuotoju);
// 10
$user['Vardas'] = 'Ivan';
$user['Pavarde'] = 'Bondarev';
$user['Gimimo metai'] = 1990;
$user['Lytis'] = 'Vyras';
foreach($user as $key => $value) {
    echo $key . " : " . $value . ', ';
}

