<?php

namespace App\interfaces;

use App\Entidades\PedidoItem;
use App\Models\PedidoItemModel;

interface PedidoItemRepositorioInterface
{
    public function __construct(PedidoItemModel $pedidoItemModel);
    public function filtrar(string $campo, string $valor);
    public function obterPorId(int $id);
    public function obterPorItem(int $numeroPedido, int $codProduto, int $seq);
    public function salvar(PedidoItem $pedidoItem);
    public function excluir(int $id);
}