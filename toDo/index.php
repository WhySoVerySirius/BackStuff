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
            require './classes/Display.php';
            Display::display('todos.json')
            ?>
    </section>
</body>
</html>