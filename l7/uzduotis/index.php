<?php
$fridge = ['alus', 'desra', 'agurkas', 'suris', 'pienas'];
$iWant = ['pienas', 'pica'];
?>
<h1>Ar viska turiu saldytuve?</h1>
<h2>
<?php
foreach ($iWant as $value) {
    echo in_array ($value, $fridge) ? "<p>$value : turiu</p>" : "<p>$value : neturiu</p>";
}
?>
</h2>
<br>
<br>
<h1> Saldytuve liko </h1>
<h2>
<?php
foreach (array_diff($fridge, $iWant) as $value) {
    echo "<p>$value</p>";
}
?>
</h2>
<br>
<br>
<h2>
<?php
$fridge2 = [
    'Pienas'=>1.45,
    'Suris'=> 4.99,
    'Alus'=>1.25,
    'Agurkas'=>2.39,
    'Desra'=>5.49,
];

$item = array_rand($fridge2);
echo $item.'  '.$fridge2[$item];
?>
</h2>