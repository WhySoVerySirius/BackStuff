<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./submit.php" method="POST">
        <fieldset>
            <legend>ToDo:</legend>
            <input type="text" name='todo'>
            <input type="date" name="todo-date" id="">
            <input type="time" name="todo-time" id="">
            <input type="submit" value="send">
        </fieldset>
    </form>
    <section>
        <h1>ToDo's</h1>
            <?php
            $fileName = 'todos.json';
            $decodedData = json_decode ( file_get_contents($fileName) );
            array_map ( function (object $obj): void {
                echo '<form method="POST" action="./delete.php">
                            <fieldset>
                                <legend>'. $obj->todo . '</legend>
                                <li>' . ' Do by: '. $obj->todoDate. ' '. $obj->todoTime. '  Date created: '. $obj->creationDate. '</li>';
                echo '<input type="hidden" name="'. $obj->id. '">
                      <input type="submit" value="delete">
                      </fieldset>
                      </form>';
            }, $decodedData)
            ?>
    </section>
</body>
</html>