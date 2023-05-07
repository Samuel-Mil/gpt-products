<?php

// Remove that 3 lines in production!
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';

$app = new App\Core\Application(dirname(__DIR__));

include_once __DIR__. '/../routes/web.php';

$app->run();
