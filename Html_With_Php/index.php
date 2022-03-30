<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.muicss.com/mui-0.10.3/extra/mui-colors.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
    <link rel="stylesheet" href="./Styles/index.css">
    <script src="./Scripts/Index.js" type="module" defer></script>
</head>
<body>
    <div id="sidebar" class="mui--bg-color-indigo-500">
            <div class="links mui--text-light mui--text-display1 mui--align-vertical" id="questionTab">QUESTIONS</div>
            <div class="links mui--text-light mui--text-display1 mui--align-vertical" id="chatTab">CHAT</div>
    </div>
    <?php
    isset ($_SERVER['REQUEST_URI']) && !empty(ltrim($_SERVER['REQUEST_URI'],'/'))
        ? include './HTML_components/' . ltrim($_SERVER['REQUEST_URI'], '/').'.php'
        : var_dump($_SERVER['REQUEST_URI']);
    ?>
</body>
</html>