<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $produtos = new ProdutoModel();

        return view('templates/header') .
            view('templates/navbar') .
            view('administracao', ['produtos' => $produtos->findAll()]) .
            view('templates/footer');
    }
}
