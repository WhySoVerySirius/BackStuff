<?php
class Display {

    private static function decode (string $fileName) : array
    {
        return json_decode ( file_get_contents($fileName) );
    }

    public static function display (string $fileName) : void
    {
        array_map ( function (object $obj): void {
            echo '<form method="POST" action="./delete.php">
                        <fieldset>
                            <legend>'. $obj->todo . '</legend>
                            <li>' . ' Do by: '. $obj->todoDate. ' '. $obj->todoTime. '  Date created: '. $obj->creationDate. '</li>';
            echo '<input type="hidden" name="'. $obj->id. '">
                  <input type="submit" value="delete">
                  </fieldset>
                  </form>';
        }, Display::decode ($fileName) );
    }
}