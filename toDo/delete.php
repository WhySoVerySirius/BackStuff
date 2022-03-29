<?php
$fileName = './todos.json';
$idToRemove = key($_POST);
$decodedData = json_decode(file_get_contents($fileName), true);
$filteredData = array_filter (
    $decodedData, 
    function (array $arr) use ($idToRemove): bool {
        return $arr['id'] !== $idToRemove;
});
file_put_contents($fileName, json_encode(array_values($filteredData)));
header('location: index.php');