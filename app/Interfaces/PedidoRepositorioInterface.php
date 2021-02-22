<?php

namespace App\interfaces;

use App\Entidades\Pedido;
use App\Models\PedidoModel;

interface PedidoRepositorioInterface
{
    public function __construct(PedidoModel $pedidoModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorNumeroPedido(int $numero);
    public function salvar(Pedido $pedido);
    public function excluir(int $id);
}