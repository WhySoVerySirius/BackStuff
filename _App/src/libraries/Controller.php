<?php
abstract Class Controller {

    public View $view;

    public function __construct($controllerIndex)
    {
        $pathToView = 'src/views/' . $controllerIndex . '/index.php';
        $pathToCss = 'src/views/' . $controllerIndex . '/style.css';
        if (file_exists($pathToView)) {
            $this->view = new View($pathToView, $controllerIndex, $pathToCss);
        } else {
        $this->view = new View('src/views/error/index.php', $controllerIndex,'src/views/error/style.css');
        }
        // file_exists($pathToView)
        //     ? $this->view = new View($pathToView, $controllerIndex)
        //     : null;
    }

    public abstract function index();
}