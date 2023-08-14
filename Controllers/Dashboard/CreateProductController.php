<?php

namespace App\Controllers\Dashboard;

use App\Core\Controller;
use App\Models\Dashboard\CreateProductModel;

class CreateProductController extends Controller
{
    public function index()
    {
        $this->setLayout('dashboard');
        return $this->render('dashboard/create_product');
    }

    public function register()
    {
        $model = new CreateProductModel();

        $data = [];
        
        if(isset($_POST['action'])){
            $data = [
                $_POST['name'],
                $_POST['price'],
                $_POST['description'],
                1
            ];
        }

        try{
            $model->register($data);
        }catch(\Exception $e){
            echo "<pre>";
            var_dump($e->getMessage());
            echo "</pre>";
        }
    }
}
