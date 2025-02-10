<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuario extends BaseController
{

    public function listarTodos(){
        $users = auth()->getProvider();

        return $users->findAll();
    }

    public function definirAdmin($id){
       $users = auth()->getProvider();
       $user = $users->find($id);
       $user->addGroup('admin');

       return redirect()->route('usuarios');
    }

    public function removeAdmin($id){
        $users = auth()->getProvider();
        $user = $users->find($id);
        $user->removeGroup('admin');

        return redirect()->route('usuarios');
    }

    public function excluirUsuario($id){
        $users = auth()->getProvider();

        $users->delete($id, true);
        return redirect()->route('usuarios');
    }

    public function cadlogin()
    {
        return view('templates/header') .
            view('templates/navbar') .
            view('cadlogin') .
            view('templates/footer');
    }

    public function login()
    {
        return view('templates/header') .
            view('templates/navbar') .
            view('login') .
            view('templates/footer');
    }

    public function administracao()
    {
        return view('templates/header') .
            view('templates/navbar') .
            view('administracao') .
            view('templates/footer');
    }

    public function usuarios()
    {
        return view('templates/header') .
            view('templates/navbar') .
            view('usuarios', ['usuarios' => $this->listarTodos()]) .
            view('templates/footer');
    }


}
