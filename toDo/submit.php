<?php
class Record {
    private string $todo;
    private string $date;
    private string $time;
    private int $id;
    private string $creationDate;

    public function __construct (string $todo, string $date, string $time)
    {
        $this -> todo = $todo;
        $this -> todoDate = $date;
        $this -> todoTime = $time;
        $this -> creationDate = date_format(date_create(), 'Y-M-d H:i:s');
        $this -> id = time();
    }
    public function writeToFile (string $fileName): void {
        $decodedFileData = json_decode ( file_get_contents($fileName), true) ?? [];
        array_push ( $decodedFileData, $this );
        file_put_contents ( $fileName, json_encode($decodedFileData) );
    }
}


if (!empty($_POST['todo'])) {
    $fileName = 'todos.json';
    $newData = new Record ( filter_var($_POST['todo'], FILTER_SANITIZE_SPECIAL_CHARS), $_POST['todo-date'], $_POST['todo-time'] );
    $newData -> writeToFile ($fileName);
    header ('location: index.php');
    }
echo 'No input detected';
// header('location: index.php');
