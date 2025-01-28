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
            'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile,jpg,jpeg,png]'
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

            $dados['imagem'] = $nomeRand;

            if ($this->produtoModel->save($dados)) {
                session()->setFlashdata('cadastroOk', "Cadastro realizado com sucesso!");
                return redirect()->route('administracao');
            }
        }
    }

    public function listarProdutos() {
        $produtos = $this->produtoModel->findAll();
        return $produtos;
    }

    public function excluirProduto($id){
        if ($this->produtoModel->delete($id)) {
            return redirect()->route('administracao');
        }
    }

    public function editarProduto($id){

        return view('templates/header') .
            view('templates/navbar') .
            view('alterar', ['produto' => $this->produtoModel->find($id)]) .
            view('templates/footer');
    }

    public function alterarProduto() {
        $img = $this->request->getFile('userfile');

        if ($img != '') {

            if (!$this->validate([
                'userfile' => 'uploaded[userfile]|is_image[userfile]|ext_in[userfile,jpg,jpeg,png]'
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
                return redirect()->route('administracao');
            }

            if (!$img->hasMoved()) {

                $nomeRand = $img->getRandomName();

                $img->store('../../public/assets/uploads/', $nomeRand);
                session()->setFlashdata('sucesso', "Upload realizado com sucesso!");

                $dados = $this->request->getPost();
                $dados['imagem'] = $nomeRand;

                if ($this->produtoModel->update($dados['id'], $dados)) {
                    session()->setFlashdata('cadastroOk', "Atualização realizada com sucesso!");
                    return redirect()->route('administracao');
                }
            }
        } else {
            $dados = $this->request->getPost();

            $this->produtoModel->update($dados['id'], $dados);
            session()->setFlashdata('cadastroOk', "Produto atualizado com sucesso!");
            return redirect()->route('administracao');
        }
    }

    public function pesquisarProduto() {
        $pesquisa = $this->request->getGet('pesquisa');

        return view('templates/header') .
            view('templates/navbar') .
            view('administracao', ['produtos' => $this->produtoModel->like('produto',$pesquisa)->find()]) .
            view('templates/footer');
    }
}
