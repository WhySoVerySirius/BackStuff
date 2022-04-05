<?php
abstract Class Controller {

    public View $view;

    public function __construct(string $controllerIndex)
    {
        $pathToView = 'src/views/' . $controllerIndex . '/index.php';
        $pathToCss = 'src/views/' . $controllerIndex . '/style.css';
        $pathToJs = 'src/views/' . $controllerIndex . '/index.js';
        // if (file_exists($pathToView)) {
        //     $this->view = new View($pathToView, $controllerIndex, $pathToCss);
        // } else {
        // $this->view = new View('src/views/error/index.php', $controllerIndex,'src/views/error/style.css', 'index.js');
        // }
        file_exists($pathToView)
            ?$this->view = new View($pathToView, $controllerIndex, $pathToCss, $pathToJs)
            :$this->view = new View('src/views/error/index.php', $controllerIndex,'src/views/error/style.css', '/src/views/error/index.js');
    }

    public abstract function index();
}