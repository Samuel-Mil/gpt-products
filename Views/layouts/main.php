<?php
/** @var \App\Core\View $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?=$_ENV['APP_URL']?>/css/style.css">
    <link rel="stylesheet" href="<?= $this->getStyleSheet() ?>">
    <title>Main Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
</head>
<body>
    {{content}}
</body>
</html>
