<?php
class View {

    public string $pathToView, $controllerIndex;

    public function __construct(string $pathToView, string $controllerIndex,string $pathToCss,string $pathToJs)
    {
        $this->pathToView = $pathToView;
        $this->controllerIndex = $controllerIndex;
        file_exists($pathToCss)
            ? $this->pathToCss = $pathToCss
            : null;
        file_exists($pathToJs)
            ?$this->pathToJs = $pathToJs
            :null;
    }

    public function render()
    {
        include 'src/views/template.php';
    }

}