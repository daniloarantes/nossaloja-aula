<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use CodeIgniter\HTTP\ResponseInterface;

class Carrinho extends BaseController
{
    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

    public function index()
    {
        $produtos = [];
        if(session()->get('carrinho')){
            $carrinho = session()->get('carrinho');

            //die();
//            foreach($carrinho['item'] as $id => $produto){
//
//                $produtos[] = $this->produtoModel->find($id);
//                $produtos[0]['qtd'] = $produto['qtd'];
//                $produtos[0]['total'] = $produto['qtd'] * $produto['preco'];
//
//
//            }

            return view('templates/header') .
                view('templates/navbar') .
                view('carrinho', ['produtos' => $carrinho]) .
                view('templates/footer');
        }


    }


    public function adicionaProduto($id, $qtd){
        $produto = $this->produtoModel->find($id);

        if(session()->get('carrinho')){
            $carrinho = session()->get('carrinho');
            //se produto já está no carrinho

            // se não estiver, adiciona no carrinho
            $produto = $this->produtoModel->find($id);

            $carrinho['item'][$id] = [
                'qtd' => $qtd,
                'preco' => $produto['preco'],
                'total' => $qtd * $produto['preco']
            ] + $produto;



            session()->set('carrinho', $carrinho);

            return redirect()->route('carrinho');

        } else {
            //não existe carrinho criado - não testei
            session()->set('carrinho', [
                'item' => [],
            ]);
        }

    }

    public function removeProduto($id){
        $carrinho = session()->get('carrinho');
        unset($carrinho["item"][$id]);
        session()->set('carrinho', $carrinho);
        return redirect()->to('carrinho');
    }

}
