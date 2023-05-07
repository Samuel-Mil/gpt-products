<?php

use App\Controllers\HomeController;
use App\Core\Application;

$router = Application::$app->router;

$router->get("/", [HomeController::class, "index"]);
