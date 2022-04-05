    <?php
    require './src/libraries/Application.php';
    require './src/libraries/Controller.php';
    require './src/libraries/View.php';
    require './src/Controllers/ErrorController.php';
    require './src/Controllers/HomeController.php';
    require './src/Controllers/PostController.php';
    require './src/Controllers/AboutController.php';
    require './src/Controllers/LoginController.php';
    // Application::pageIndex();
    new Application();
    ?>
