<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'src/views/components/head.php';
    ?>
    <link rel="stylesheet" href="<?php echo $this->pathToCss ?>">
    <script src="<?php echo $this->pathToJs ?>"></script>
</head>
<body>
    <?php
    include $this->pathToView;
    ?>
    <?php
    include 'src/views/components/footer.php'
    ?>
</body>
</html>