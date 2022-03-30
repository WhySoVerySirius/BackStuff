<?php
class Record {
    public string $todo;
    public string $date;
    public string $time;
    public string $id;
    public string $creationDate;

    public function __construct (string $todo, string $date, string $time)
    {
        $this->todo = $todo;
        $this->todoDate = $date;
        $this->todoTime = $time;
        $this->creationDate = date_format(date_create(), 'Y-M-d H:i:s');
        $this->id = hash('sha256', strval(time() + rand(1, 9999)));
    }

    public function writeToFile (string $fileName): void {
        $decodedFileData = json_decode (file_get_contents($fileName), true) ?? [];
        array_push ( $decodedFileData, $this );
        file_put_contents ( $fileName, json_encode ($decodedFileData) );
    }
}