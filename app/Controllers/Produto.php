<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Produto extends BaseController
{
    private $produtoModel;

    public function __construct(){
        $this->produtoModel = new ProdutoModel();
    }

    public function cadastrarProduto() {
        return view('templates/header') .
            view('templates/navbar') .
            view('cadastro') .
            view('templates/footer');
    }

    public function salvarProduto() {
        $img = $this->request->getFile('userfile');

        if (! $this->validate([
            'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile,jpg,jpeg,png]|max_dims[userfile,1920,1080]'
        ], [
            'userfile' => [
                'uploaded' => 'Escolha uma imagem',
                'is_image' => 'Escolha uma imagem',
                'ext_in' => 'A extensão ' . $img->getExtension() . '  é inválida!',
                'max_dims' => 'Aceito somente imagens de até 1920x1080'
            ]
        ])) {
            session()->setFlashdata('erros', $this->validator->getErrors());
            //return redirect()->route('produto/cadProduto');
            return redirect()->route('cadastrar');
        }

        if (! $img->hasMoved()) {

            $nomeRand = $img->getRandomName();

            $img->store('../../public/assets/uploads/', $nomeRand);
            session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

            $dados = $this->request->getPost();

            if ($this->produtoModel->save($dados)) {
                return redirect()->route('administracao');
            }
        }


    }

    public function alterarProduto() {
        return view('templates/header') .
            view('templates/navbar') .
            view('alterar') .
            view('templates/footer');
    }

    public function pesquisarProduto() {
        return view('templates/header') .
            view('templates/navbar') .
            view('pesquisa') .
            view('templates/footer');
    }
}
