<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
//$routes->get('login', 'Usuario::login');
$routes->get('administracao', 'Admin::index', ['filter' => 'group:admin']);

$routes->get('cadlogin', 'Usuario::cadlogin');

$routes->post('produto/salvarProduto', 'Produto::salvarProduto', ['filter' => 'group:admin']);
$routes->get('produto/excluirProduto/(:num)', 'Produto::excluirProduto/$1', ['filter' => 'group:admin']);
$routes->get('produto/editarProduto/(:num)', 'Produto::editarProduto/$1', ['filter' => 'group:admin']);
$routes->post('produto/alterarProduto', 'Produto::alterarProduto', ['filter' => 'group:admin']);
$routes->get('produto/pesquisarProduto', 'Produto::pesquisarProduto', ['filter' => 'group:admin']);
$routes->get('cadastrar', 'Produto::cadastrarProduto', ['filter' => 'group:admin']);

$routes->get('produto/buscarProduto', 'Produto::buscarProduto');



$routes->get('usuarios', 'Usuario::usuarios', ['filter' => 'group:admin']);
$routes->get('usuarios/definirAdmin/(:num)', 'Usuario::definirAdmin/$1', ['filter' => 'group:admin']);
$routes->get('usuarios/removeAdmin/(:num)', 'Usuario::removeAdmin/$1', ['filter' => 'group:admin']);
$routes->get('usuarios/excluirUsuario/(:num)', 'Usuario::excluirUsuario/$1', ['filter' => 'group:admin']);

service('auth')->routes($routes);