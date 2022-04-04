<?php
class View {

    public string $pathToView, $controllerIndex;

    public function __construct(string $pathToView, string $controllerIndex,string $pathToCss)
    {
        $this->pathToView = $pathToView;
        $this->controllerIndex = $controllerIndex;
        $this->pathToCss = $pathToCss;
    }

    public function render()
    {
        include 'src/views/template.php';
    }

}