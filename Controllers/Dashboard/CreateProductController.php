<?php

namespace App\Controllers\Dashboard;

use App\Core\Controller;

class CreateProductController extends Controller
{
    public function index()
    {
        $this->setLayout('dashboard');
        return $this->render('dashboard/create_product');
    }
}