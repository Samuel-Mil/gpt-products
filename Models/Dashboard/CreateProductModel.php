<?php

namespace App\Models\Dashboard;

use App\Core\Database;
use App\Core\Application;

class CreateProductModel
{
    private Database $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    public function register(array $data)
    {
        $product = $this->db::prepare("
            INSERT INTO `products` 
            VALUES (null, ?, ?, ?, ?)
        ");

        if(!$product->execute($data)){
            throw new \Exception("Error registering product!");
        }

        return true;
    }
}