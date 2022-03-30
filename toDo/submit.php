<?php
include_once './classes/Record.php';

if (!empty($_POST['todo'])) {
    $fileName = 'todos.json';
    $newData = new Record ( filter_var($_POST['todo'], FILTER_SANITIZE_SPECIAL_CHARS), $_POST['todo-date'], $_POST['todo-time'] );
    $newData -> writeToFile ($fileName);
    header ('location: index.php');
    }
echo 'No input detected';
// header('location: index.php');
