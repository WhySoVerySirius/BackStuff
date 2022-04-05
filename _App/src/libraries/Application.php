<?php

// class Application {

//     public static function pageIndex () {

//         $URL = isset($_SERVER['REQUEST_URI']) && ($_SERVER['REQUEST_URI'] != '/')
//             ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/'))
//             : ['home'];

//         Application::showPage(ucfirst($URL[0]).'Controller');        

//     }

//     public static function showPage (string $name): object {

//         return class_exists($name)
//         ? new $name
//         : new ErrorController;
//     }

// }

Class Application {

    public Controller $controller;

    public function __construct()
    {
        $URL = isset($_SERVER['REQUEST_URI']) && ($_SERVER['REQUEST_URI'] != '/')
        ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/'))
        : ['home'];
        
        if ($_SERVER['REQUEST_URI'] === '/home') {
            header('Location: /');
        }

        $controllerIndex = $URL[0];
        $method = $URL[1] ?? 'index';

        $this->controller = $this->createController($controllerIndex);
        $method = method_exists($this->controller, $method)
            ? $method
            : 'index';
        $this->controller->$method();
    }

    public function createController(string $controllerIndex): Controller
    {
        $controllerName = ucfirst($controllerIndex) . 'Controller';
        return class_exists($controllerName)
            ? new $controllerName($controllerIndex)
            : new ErrorController($controllerIndex);
    }


}