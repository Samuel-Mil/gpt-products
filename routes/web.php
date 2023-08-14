<?php

use App\Core\Application;
use App\Controllers\HomeController;
use App\Controllers\Dashboard\CreateProductController;


$router = Application::$app->router;

$router->get("/", [HomeController::class, "index"]);
$router->get("/dashboard/create_product", [CreateProductController::class, "index"]);

$router->post("/register/product", [CreateProductController::class, "register"]);
