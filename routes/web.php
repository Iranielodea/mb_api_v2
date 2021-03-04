<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'grupo'], function () use($router){
    $router->get('/', 'GrupoController@listar');
    $router->post('/', 'GrupoController@inserir');
    $router->get('/{id}', 'GrupoController@obterPorId');
    $router->put('/', 'GrupoController@atualizar');
    $router->delete('/{id}', 'GrupoController@excluir');
});

$router->group(['prefix' => 'usuario'], function () use($router){
    $router->get('/', 'UsuarioController@listar');
    $router->post('/', 'UsuarioController@inserir');
    $router->get('/{id}', 'UsuarioController@obterPorId');
    $router->put('/', 'UsuarioController@atualizar');
    $router->delete('/{id}', 'UsuarioController@excluir');
});

$router->group(['prefix' => 'cliente'], function () use($router){
    $router->get('/', 'ClienteController@listar');
    $router->post('/', 'ClienteController@inserir');
    $router->get('/{id}', 'ClienteController@obterPorId');
    $router->put('/', 'ClienteController@atualizar');
    $router->delete('/{id}', 'ClienteController@excluir');
});

$router->group(['prefix' => 'transportadora'], function () use($router){
    $router->get('/', 'TransportadoraController@listar');
    $router->post('/', 'TransportadoraController@inserir');
    $router->get('/{id}', 'TransportadoraController@obterPorId');
    $router->put('/', 'TransportadoraController@atualizar');
    $router->delete('/{id}', 'TransportadoraController@excluir');
});

$router->group(['prefix' => 'pedido'], function () use($router){
    $router->get('/', 'pedidoController@listar');
    $router->post('/', 'pedidoController@inserir');
    $router->get('/{id}', 'pedidoController@obterPorId');
    $router->put('/', 'pedidoController@atualizar');
    $router->delete('/{id}', 'pedidoController@excluir');
});

$router->group(['prefix' => 'pedidoItem'], function () use($router){
    $router->get('/', 'pedidoItemController@listar');
    $router->post('/', 'pedidoItemController@inserir');
    $router->get('/{id}', 'pedidoItemController@obterPorId');
    $router->put('/', 'pedidoItemController@atualizar');
    $router->delete('/{id}', 'pedidoItemController@excluir');
    $router->get('/{numPedido}/{codProduto}/{seq}', 'pedidoItemController@obterPorItem');
});

$router->group(['prefix' => 'carga'], function () use($router){
    $router->get('/', 'cargaController@listar');
    $router->post('/incluir', 'cargaController@incluir');
    $router->post('/', 'cargaController@inserir');
    $router->get('/{id}', 'cargaController@obterPorId');
    $router->put('/', 'cargaController@atualizar');
    $router->delete('/{id}', 'cargaController@excluir');
});

$router->group(['prefix' => 'conta'], function () use($router){
    $router->get('/', 'contaController@listar');
    $router->post('/', 'contaController@inserir');
    $router->post('/incluir', 'contaController@incluir');
    $router->get('/{id}', 'contaController@obterPorId');
    $router->put('/', 'contaController@atualizar');
    $router->delete('/{id}', 'contaController@excluir');
});

$router->group(['prefix' => 'contaBanco'], function () use($router){
    $router->get('/', 'contaBancoController@listar');
    $router->post('/', 'contaBancoController@inserir');
    $router->get('/{id}', 'contaBancoController@obterPorId');
    $router->put('/', 'contaBancoController@atualizar');
    $router->delete('/{id}', 'contaBancoController@excluir');
});

